<?php

namespace Dcat\Admin\Http\Controllers;

use Carbon\Carbon;
use Dcat\Admin\Admin;
use ReCaptcha\ReCaptcha;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Models\Activation;
use Illuminate\Routing\Controller;
use Dcat\Admin\Models\Administrator;
use Illuminate\Support\Facades\Hash;
use Dcat\Admin\Traits\HasFormResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use D4T\Core\Notifications\UserRegisteredNotification;
use D4T\Core\Notifications\UserActivationRequiredNotification;

class RegistrationController extends Controller
{
    use HasFormResponse;

    protected string $view = 'admin::pages.registration';

    public function show(Content $content)
    {
        if ($this->guard()->check()) {
            return redirect($this->getRedirectPath());
        }

        return $content->full()->body(view($this->view));
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        $user->notify(new UserRegisteredNotification());
        event(new Registered($user));

        return $this->response()
            ->success(trans('admin.register_successful'))
            ->with('registered', __('admin.check_email_activation'))
            ->refresh()
            ->send();
    }

    protected function validator(array $data)
    {
        $data['captcha'] = config('admin.registration.recaptch-enabled') ? $this->captchaCheck() : true;

        return Validator::make($data,
            [
                'name'                  => 'required|max:255',
                'email'                 => 'required|email|max:255|unique:admin_users',
                'password'              => 'required|min:6|max:30|confirmed',
                'password_confirmation' => 'required|same:password',
                'g-recaptcha-response'  => '',
                'captcha'               => 'required|min:1',
            ],
            [
                'name.required'                 => trans('auth.userNameRequired'),
                'email.required'                => trans('auth.emailRequired'),
                'email.email'                   => trans('auth.emailInvalid'),
                'password.required'             => trans('auth.passwordRequired'),
                'password.min'                  => trans('auth.PasswordMin'),
                'password.max'                  => trans('auth.PasswordMax'),
                'g-recaptcha-response.required' => trans('auth.captchaRequire'),
                'captcha.min'                   => trans('auth.CaptchaWrong'),
            ]
        );
    }

    protected function create(array $data) : Administrator
    {
        $user = Administrator::create([
                'name'              => $data['name'],
                'username'          => $data['email'],
                'email'             => $data['email'],
                'password'          => Hash::make($data['password']),
                'signup_ip'         => request()->getClientIp(),
                'activated'         => !config('admin.registration.activation-enabled'),
                'creator_id'        => Admin::domain()->manager_id,
                'domain_id'        => Admin::domain()->id,
            ]);

        $this->initiateEmailActivation($user);
        //event(new UserReferred(request()->cookie('ref'), $user));

        return $user;
    }

    protected function guard()
    {
        return Admin::guard();
    }

    protected function getRedirectPath()
    {
        return admin_url('/');
    }

    public function initiateEmailActivation(Administrator $user)
    {
        if (!config('admin.registration.activation-enabled') || !$this->validateEmail($user)) {
            return true;
        }

        $this->createTokenAndSendEmail($user);
    }

    protected function validateEmail(Administrator $user): bool
    {
        $validator = Validator::make(
            ['email' => $user->email],
            ['email' => 'required|email']
        );
        return !$validator->fails();
    }

    public function createTokenAndSendEmail(Administrator $user) : bool
    {
        $activations = Activation::where('user_id', $user->id)
            ->where('created_at', '>=', Carbon::now()->subHours(config('registration.time_period')))
            ->count();

        if ($activations >= config('admin.registration.max_attempts')) {
            return true;
        }

        //if user changed activated email to new one
        if ($user->activated) {
            $user->update([
                'activated' => false,
            ]);
        }

        // Create new Activation record for this user
        $activation = $this->createNewActivationToken($user);

        // Send activation email notification
        $this->sendNewActivationEmail($user, $activation->token);

        return true;
    }

    public function createNewActivationToken(Administrator $user) : Activation
    {
        $activation = new Activation();
        $activation->user_id = $user->id;
        $activation->token = Str::random(64);
        $activation->ip_address = request()->getClientIp();
        $activation->save();

        return $activation;
    }

    public function sendNewActivationEmail(Administrator $user, string $token) : void
    {
        $url = Admin::domain()->full_url;
        $link =  $url.'/activate/'.$token;

        $user->notify(new UserActivationRequiredNotification($link, $user->domain_id));
    }

    public function deleteExpiredActivations() : void
    {
        Activation::where('created_at', '<=', Carbon::now()->subHours(72))->delete();
    }

    public function captchaCheck(): bool
    {
        $response = request()->get('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret = config('admin.recaptch-secret');

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        return $resp->isSuccess();
    }
}

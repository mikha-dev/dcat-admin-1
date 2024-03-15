<?php

namespace Dcat\Admin\Http\Controllers;

use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Admin;
use D4T\Core\Models\Domain;
use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\Models\Administrator;
use Dcat\Admin\Http\Controllers\AdminController;

class DomainController extends AdminController
{

    protected $title = 'Domains';

    protected function grid()
    {
        return new Grid( Domain::with('manager'), function (Grid $grid) {

            $grid->column('host_base')->editable();
            $grid->column('manager.username', trans('admin.manager'));

            if (config('admin.permission.enable')) {
                $grid->column('default_roles')->pluck('name')->label(StyleClassType::PRIMARY, 3);
            }

            $grid->disableFilterButton();
            $grid->disableRefreshButton();
            $grid->disableViewButton();
        });
    }

    protected function form()
    {
        return new Form( Domain::with(['manager','default_roles']), function (Form $form) {

            $form->text('host_base')->required();


            $users = Administrator::whereManagerId(Admin::user()->id)->pluck('username', 'id');
            $form->select('manager_id', trans('admin.manager'))->options($users)->required();

            if (config('admin.permission.enable')) {
                $form->multipleSelect('default_roles', trans('admin.roles'))
                    ->options(function () {
                        /** @var Model $roleModel */
                        $roleModel = config('admin.database.roles_model');

                        return $roleModel::all()->pluck('name', 'id');
                    })
                    ->customFormat(function ($v) {
                        return array_column($v, 'id');
                    });
            }

            $form->disableViewButton();
        });
    }
}

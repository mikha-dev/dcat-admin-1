<?php

namespace Dcat\Admin\Http\Controllers;

use Dcat\Admin\Admin;
use Dcat\Admin\Layout\Content;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return Admin::home()->render($content);
    }
}


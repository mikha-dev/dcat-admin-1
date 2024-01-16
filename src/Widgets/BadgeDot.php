<?php

namespace Dcat\Admin\Widgets;

use D4T\Core\Enums\StyleClassType;
use Illuminate\Contracts\Support\Renderable;

class BadgeDot implements Renderable
{
    protected $view = 'admin::widgets.badge-dot';

    public function __construct(protected StyleClassType $class = StyleClassType::PRIMARY)
    {
    }

    public function render()
    {
        $data['class'] = $this->class->value;

        return view($this->view, $data)->render();
    }
}

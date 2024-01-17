<?php

namespace Dcat\Admin\Widgets;

use D4T\Core\Enums\StyleClassType;
use Illuminate\Contracts\Support\Renderable;

class BadgeDot implements Renderable
{
    protected $view = 'admin::widgets.badge-dot';
    protected ?string $title = null;

    public function __construct(protected StyleClassType $class = StyleClassType::PRIMARY, ?string $title = null)
    {
        $this->title = $title;
    }

    public function render()
    {
        $data['class'] = $this->class->value;
        $data['title'] = $this->title;

        return view($this->view, $data)->render();
    }
}

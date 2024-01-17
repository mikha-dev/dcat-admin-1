<?php

namespace Dcat\Admin\Widgets;

use D4T\Core\Enums\StyleClassType;
use Illuminate\Contracts\Support\Renderable;

class IconicLink implements Renderable
{
    protected $view = 'admin::widgets.iconic-link';

    public function __construct(
        protected string $icon,
        protected string $text,
        protected string $href,
        protected StyleClassType $class = StyleClassType::DARK
    )
    {
    }

    public function render()
    {
        $data['text'] = $this->text;
        $data['icon'] = $this->icon;
        $data['href'] = $this->href;
        $data['class'] = $this->class;

        return view($this->view, $data)->render();
    }
}

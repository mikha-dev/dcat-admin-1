<?php

namespace Dcat\Admin\Widgets;

use Illuminate\Contracts\Support\Renderable;

class IconicLink implements Renderable
{
    protected $view = 'admin::widgets.iconic-link';

    public function __construct(protected string $icon, protected string $text, protected string $href)
    {
    }

    //todo::rm
//     public function render()
//     {
//         return <<<HTML
//         <p class="text-nowrap">{$this->icon}<a class="pl-2" href="{$this->href}">{$this->text}</a></p>
// HTML;
//     }

    public function render()
    {
        $data['text'] = $this->text;
        $data['icon'] = $this->icon;
        $data['href'] = $this->href;

        return view($this->view, $data)->render();
    }
}

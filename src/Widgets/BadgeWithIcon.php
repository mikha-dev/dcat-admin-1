<?php

namespace Dcat\Admin\Widgets;

use D4T\Core\Enums\StyleClassType;
use Illuminate\Contracts\Support\Renderable;

class BadgeWithIcon implements Renderable
{
    protected $view = 'admin::widgets.badge-with-icon';

    public function __construct(protected string $title, protected string $description, protected string $icon, protected StyleClassType $class = StyleClassType::PRIMARY)
    {
    }

    //todo::rm
//     public function render()
//     {
//         $style = $this->style->value;
//         return <<<HTML
//         <span class="badge rounded-pill bg-{$style}"><strong>{$this->title}:</strong><span class="mx-2">{$this->description}</span>{$this->icon}</span>
// HTML;
//     }

    public function render()
    {
        $data['title'] = $this->title;
        $data['description'] = $this->description;
        $data['icon'] = $this->icon;
        $data['class'] = $this->class->value;

        return view($this->view, $data)->render();
    }
}


<?php

namespace Dcat\Admin\Widgets;

use Illuminate\Contracts\Support\Renderable;

class TabWithProgress implements Renderable
{
    protected $view = 'admin::widgets.tab-with-progress';

    protected array $tabs = [];

    public function add(string $icon, string $title, string $description, string $href, float $progress = 1, $active = false, ?string $id = null)
    {
        $this->tabs[$id] = ['icon' => $icon, 'title' => $title, 'description' => $description, 'href' => $href, 'progress' => $progress, 'active' => $active, 'id' => $id];

        return $this;
    }

    public function render()
    {

        $vars = [
            'tabs'    => $this->tabs
        ];

        return view($this->view, $vars)->render();
    }
}

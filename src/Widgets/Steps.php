<?php

namespace Dcat\Admin\Widgets;

use Illuminate\Contracts\Support\Renderable;

class Steps implements Renderable
{
    protected $view = 'admin::widgets.steps';

    protected array $items = [];

    public function add(string $title, string $description, string $icon, bool $active = false, $id = null)
    {

        $id = $id ?: mt_rand();

        $this->items[$id] = [
            'title' => $title,
            'description' => $description,
            'icon' => $icon,
            'active' => $active,
            'id' => $id
        ];

        return $this;
    }

    public function render()
    {
        $data['items'] = $this->items;

        return view($this->view, $data)->render();
    }
}

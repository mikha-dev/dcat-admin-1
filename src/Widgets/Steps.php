<?php
declare(strict_types=1);
namespace Dcat\Admin\Widgets;

use D4T\Core\Enums\StyleClassType;
use Illuminate\Contracts\Support\Renderable;

class Steps implements Renderable
{
    protected string $view = 'admin::widgets.steps';

    protected array $items = [];
    protected int $activeIdx = 0;
    protected ?string $classExt = null;
    protected StyleClassType|null $stepActiveClass = null;
    protected StyleClassType|null $stepInactiveClass = null;

    public function add(string $title, string $description, bool $active = false, string $icon = null, string $id = null): static
    {
        $id = $id ?: mt_rand();

        $this->items[] = [
            'title' => $title,
            'description' => $description,
            'icon' => $icon,
            'id' => $id,
            'index' => count($this->items) + 1
        ];

        if($active) {
            $this->activeIdx = count($this->items) - 1;
        }

        return $this;
    }

    public function classExt(string $value): static
    {
        $this->classExt = $value;

        return $this;
    }

    public function stepActiveClass(StyleClassType $value): static
    {
        $this->stepActiveClass = $value;

        return $this;
    }

    public function stepInactiveClass(StyleClassType $value): static
    {
        $this->stepInactiveClass = $value;

        return $this;
    }

    public function render(): string
    {
        $data['items'] = $this->items;
        $data['active_idx'] = $this->activeIdx;
        $data['class_ext'] = $this->classExt;
        $data['step_active_class'] = $this->stepActiveClass ? $this->stepActiveClass->value : '';
        $data['step_inactive_class'] = $this->stepInactiveClass ? $this->stepInactiveClass->value : '';

        return view($this->view, $data)->render();
    }
}

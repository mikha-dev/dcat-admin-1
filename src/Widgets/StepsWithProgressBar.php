<?php
declare(strict_types=1);
namespace Dcat\Admin\Widgets;

use D4T\Core\Enums\StyleClassType;
use Illuminate\Contracts\Support\Renderable;

class StepsWithProgressBar implements Renderable
{
    protected string $view = 'admin::widgets.steps-with-progress-bar';

    protected array $items = [];

    protected StyleClassType|null $bgClass = null;
    protected StyleClassType|null $textClass = null;
    protected StyleClassType|null $finishedClass = null;
    protected StyleClassType|null $activeClass = null;
    protected StyleClassType|null $disabledClass = null;
    protected StyleClassType|null $borderClass = null;

    public function add(
        string $title,
        string $description,
        int $percent = 0,
        bool $active = false,
        bool $disabled = false,
        string $href = '',
        string $icon = null,
        string $id = null
    ): static
    {
        $id = $id ?: mt_rand();

        $this->items[] = [
            'title' => $title,
            'description' => $description,
            'percent' => $percent,
            'href' => $href,
            'icon' => $icon,
            'id' => $id,
            'index' => count($this->items) + 1,
            'active' => $active,
            'disabled' => $disabled
        ];

        return $this;
    }

    public function bgClass(StyleClassType $value): static
    {
        $this->bgClass = $value;

        return $this;
    }

    public function textClass(StyleClassType $value): static
    {
        $this->textClass = $value;

        return $this;
    }

    public function finishedClass(StyleClassType $value): static
    {
        $this->finishedClass = $value;

        return $this;
    }

    public function activeClass(StyleClassType $value): static
    {
        $this->activeClass = $value;

        return $this;
    }

    public function disabledClass(StyleClassType $value): static
    {
        $this->disabledClass = $value;

        return $this;
    }

    public function borderClass(StyleClassType $value): static
    {
        $this->borderClass = $value;

        return $this;
    }

    public function render(): string
    {
        $data['items'] = [];
        foreach($this->items as $index => $item) {
            $data['items'][$index] = $item;

            $data['items'][$index]['icon_class'] = $this->activeClass;

            if( $data['items'][$index]['percent'] == 100 ) {
                $data['items'][$index]['icon_class'] = $this->finishedClass;
            }
            if( $data['items'][$index]['disabled'] ) {
                $data['items'][$index]['icon_class'] = $this->disabledClass;
            }
        }

        $data['bg_class'] = $this->bgClass ? $this->bgClass->value : '';
        $data['text_class'] = $this->textClass ? $this->textClass->value : '';
        $data['finished_class'] = $this->finishedClass ? $this->finishedClass->value : '';
        $data['active_class'] = $this->activeClass ? $this->activeClass->value : '';
        $data['disabled_class'] = $this->disabledClass ? $this->disabledClass->value : '';
        $data['border_class'] = $this->borderClass ? $this->borderClass->value : '';

        return view($this->view, $data)->render();
    }
}

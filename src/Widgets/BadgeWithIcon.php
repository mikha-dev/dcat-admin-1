<?php
declare(strict_types=1);
namespace Dcat\Admin\Widgets;

use D4T\Core\Enums\StyleClassType;
use Illuminate\Contracts\Support\Renderable;

class BadgeWithIcon implements Renderable
{
    protected string $view = 'admin::widgets.badge-with-icon';
    protected bool $fullWidth = false;

    protected StyleClassType $bgClass = StyleClassType::PRIMARY;
    protected StyleClassType $textClass = StyleClassType::PRIMARY;

    public function __construct(
        protected string $icon,
        protected string $title = ''
    )
    {
    }

    public function fullWidth(): static {
        $this->fullWidth = true;

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

    public function render(): string
    {
        $data['title'] = $this->title;
        $data['icon'] = $this->icon;
        $data['bg_class'] = $this->bgClass->value;
        $data['text_class'] = $this->textClass->value;
        $data['full_width'] = $this->fullWidth;

        return view($this->view, $data)->render();
    }
}


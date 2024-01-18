<?php
declare(strict_types=1);
namespace Dcat\Admin\Widgets;

use D4T\Core\Enums\StyleClassType;
use Illuminate\Contracts\Support\Renderable;

class BadgeWithIcon implements Renderable
{
    protected string $view = 'admin::widgets.badge-with-icon';
    protected bool $fullWidth = false;

    public function __construct(
        protected string $icon,
        protected StyleClassType $class = StyleClassType::PRIMARY,
        protected string $title = ''
    )
    {
    }

    public function fullWidth(): static {
        $this->fullWidth = true;

        return $this;
    }

    public function render(): string
    {
        $data['title'] = $this->title;
        $data['icon'] = $this->icon;
        $data['class'] = $this->class->value;
        $data['fullWidth'] = $this->fullWidth;

        return view($this->view, $data)->render();
    }
}


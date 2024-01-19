<?php
declare(strict_types=1);
namespace Dcat\Admin\Widgets;

use D4T\Core\Enums\StyleClassType;
use Illuminate\Contracts\Support\Renderable;

class IconicLink implements Renderable
{
    protected string $view = 'admin::widgets.iconic-link';
    protected bool $asButton = false;

    public function __construct(
        protected string $icon,
        protected string $text,
        protected string $href,
        protected StyleClassType $class = StyleClassType::DARK
    )
    {
    }

    public function asButton(): static
    {
        $this->asButton = true;

        return $this;
    }

    public function render(): string
    {
        $data['text'] = $this->text;
        $data['icon'] = $this->icon;
        $data['href'] = $this->href;
        $data['class'] = $this->class;
        $data['as_button'] = $this->asButton;

        return view($this->view, $data)->render();
    }
}

<?php
declare(strict_types=1);
namespace Dcat\Admin\Widgets;

use D4T\Core\Enums\StyleClassType;
use Illuminate\Contracts\Support\Renderable;

class Badge implements Renderable
{
    protected string $view = 'admin::widgets.badge';

    public function __construct(
        protected StyleClassType $class = StyleClassType::PRIMARY,
        protected string $title = ''
    )
    {
    }

    public function render(): string
    {
        $data['title'] = $this->title;
        $data['class'] = $this->class->value;

        return view($this->view, $data)->render();
    }
}


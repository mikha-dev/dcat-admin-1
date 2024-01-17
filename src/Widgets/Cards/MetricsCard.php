<?php

namespace Dcat\Admin\Widgets\Cards;

use Dcat\Admin\Widgets\Widget;
use Illuminate\Contracts\Support\Renderable;

class MetricsCard extends Widget
{
    protected $view = 'admin::widgets.metrics-card';
    protected string $content;
    protected ?string $icon = null;
    protected ?string $tool = null;
    protected ?string $value = null;
    protected ?string $description = null;

    public function __construct(
        protected string $title,
        protected string $c
    ) {
        $this->title($title);
        $this->content($c);
    }

    public function title(?string $title = null) : static
    {
        $this->title = $title;

        return $this;
    }

    public function content( string|\Closure|Renderable|null $content = null) :static {
        $this->content = $this->formatRenderable($content);

        return $this;
    }

    public function icon(string $value) : static {
        $this->icon = $value;

        return $this;
    }

    public function tool(string|Renderable|\Closure $value) : static
    {
        $this->tool = $this->toString($value);

        return $this;
    }

    public function value(string $value) : static {
        $this->value = $value;

        return $this;
    }

    public function description(string $value) : static {
        $this->description = $value;

        return $this;
    }

    public function defaultVariables() : array
    {
        return [
            'attributes'    => $this->formatHtmlAttributes(),
            'content'       => $this->toString($this->content),
            'title'         => $this->title,
            'icon'          => $this->icon,
            'tool'          => $this->tool,
            'value'         => $this->value,
            'description'   => $this->description
        ];
    }

}

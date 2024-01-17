<?php

namespace Dcat\Admin\Widgets;

use Dcat\Admin\Traits\LazyWidget;
use Illuminate\Contracts\Support\Renderable;

class SimpleCard extends Widget
{
    protected $view = 'admin::widgets.card-simple';
    protected ?string $title = null;
    protected string $content;
    protected ?string $footer = null;
    protected ?string $tool = null;
    protected bool $fullHeight = false;

    public function __construct(?string $title = null, string|\Closure|Renderable|LazyWidget|null $content = null)
    {
        $this->title($title);
        $this->content($content);
    }

    public function content( string|\Closure|Renderable|LazyWidget|null $content = null) : static
    {
        $this->content = $this->toString($content);

        return $this;
    }

    public function fullHeight(bool $value = true) : static {
        $this->fullHeight = $value;

        return $this;
    }

    public function footer(string $content) : static
    {
        $this->footer = $content;

        return $this;
    }

    public function title(?string $title = null) : static
    {
        $this->title = $title;

        return $this;
    }

    public function tool(string|Renderable|\Closure $content) : static
    {
        $this->tool = $this->toString($content);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function defaultVariables()
    {
        return [
            'title'      => $this->title,
            'content'    => $this->toString($this->content),
            'footer'     => $this->toString($this->footer),
            'tool'      => $this->tool,
            'class' => $this->getHtmlAttribute('class'),
            'style' => $this->getHtmlAttribute('style'),
            'fullHeight' => $this->fullHeight,
        ];
    }
}

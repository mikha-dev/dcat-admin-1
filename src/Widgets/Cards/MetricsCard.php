<?php
declare(strict_types=1);
namespace Dcat\Admin\Widgets\Cards;

use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\Widgets\Widget;
use Illuminate\Contracts\Support\Renderable;

class MetricsCard extends Widget
{
    protected $view = 'admin::widgets.metrics-card';
    protected ?string $icon = null;
    protected ?string $tool = null;
    protected ?string $value = null;
    protected ?string $target = null;

    protected ?StyleClassType $valueClass = null;
    protected ?StyleClassType $titleClass = null;

    public function __construct(
        protected string $title,
        protected string|\Closure|Renderable $content,
        protected string $id = ''
    ) {
        $this->title($title);
        $this->content($content);

        if( empty($this->id) ) {
            $this->id = 'id-metrics-card-'.md5(time().rand());
        }
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

    public function icon(string|\Closure|Renderable|null $value) : static {
        $this->icon = $this->toString($value);

        return $this;
    }

    public function tool(string|Renderable|\Closure|null $value) : static
    {
        $this->tool = $this->toString($value);

        return $this;
    }

    public function value(string $value) : static {
        $this->value = $value;

        return $this;
    }

    public function target(string $value) : static {
        $this->target = $value;

        return $this;
    }

    public function valueClass(StyleClassType $value): static
    {
        $this->valueClass = $value;

        return $this;
    }

    public function titleClass(StyleClassType $value): static
    {
        $this->titleClass = $value;

        return $this;
    }

    public function defaultVariables() : array
    {
        return [
            'id'            => $this->id,
            'attributes'    => $this->formatHtmlAttributes(),
            'content'       => $this->toString($this->content),
            'title'         => $this->title,
            'icon'          => $this->icon,
            'tool'          => $this->tool,
            'value'         => $this->value,
            'target'        => $this->target,
            'value_class'   => is_null($this->valueClass) ? '' : $this->valueClass->value,
            'title_class'   => is_null($this->titleClass) ? '' : $this->titleClass->value
        ];
    }
}

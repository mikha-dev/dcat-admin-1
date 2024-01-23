<?php

namespace Dcat\Admin\Widgets;

use D4T\Core\Enums\StyleClassType;
use Illuminate\Contracts\Support\Renderable;

class FeaturedCard extends Widget
{
    protected $view = 'admin::widgets.card-featured';

    protected ?string $title = null;
    protected ?string $image = null;
    protected ?string $headerContent = null;
    protected array $footerLinks = [];
    protected array $features = [];
    protected bool $fullHeight = false;
    protected bool $withBorder = false;
    protected StyleClassType|null $borderClass = StyleClassType::DARK;

    public function __construct(?string $title = null)
    {
        $this->title($title);
    }

    public function image(string|Renderable $value) : static
    {
        $this->image = $this->toString($value);

        return $this;
    }

    public function headerContent(string|Renderable|\Closure $value) : static
    {
        $this->headerContent = $this->toString($value);

        return $this;
    }

    public function fullHeight(bool $value = true) : static
    {
        $this->fullHeight = $value;

        return $this;
    }

    public function withBorder(): static
    {
        $this->withBorder = true;

        return $this;
    }

    public function borderClass(StyleClassType $borderClass): static
    {
        $this->borderClass = $borderClass;

        return $this;
    }

    public function addFeature(string|Renderable|\Closure  $content) : static
    {
        $this->features[] = $this->toString($content);

        return $this;
    }

    public function addFooterLink(string|Renderable|\Closure  $content) : static
    {
        $this->footerLinks[] = $this->toString($content);;

        return $this;
    }

    public function title(?string $title = null) : static
    {
        $this->title = $title;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function defaultVariables()
    {
        return [
            'title'             => $this->title,
            'image'             => $this->image,
            'header_content'    => $this->headerContent,
            'features'          => $this->features,
            'footer_links'      => $this->footerLinks,
            'class'             => $this->getHtmlAttribute('class'),
            'style'             => $this->getHtmlAttribute('style'),
            'full_height'       => $this->fullHeight,
            'with_border'       => $this->withBorder,
            'border_class'      => empty($this->borderClass) ? '' : $this->borderClass->value
        ];
    }
}

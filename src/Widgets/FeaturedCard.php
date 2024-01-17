<?php

namespace Dcat\Admin\Widgets;

use Illuminate\Contracts\Support\Renderable;

class FeaturedCard extends Widget
{
    protected $view = 'admin::widgets.card-featured';

    protected ?string $title = null;
    protected ?string $icon = null;
    protected ?string $headerContent = null;
    protected array $footerLinks = [];
    protected array $features = [];
    protected bool $fullHeight = false;

    public function __construct(?string $title = null)
    {
        $this->title($title);
    }

    public function icon(string|Renderable|\Closure $value) : static
    {
        $this->icon = $this->toString($value);

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
            'title'         => $this->title,
            'icon'          => $this->icon,
            'headerContent' => $this->headerContent,
            'features'      => $this->features,
            'footerLinks'   => $this->footerLinks,
            'class'         => $this->getHtmlAttribute('class'),
            'style'         => $this->getHtmlAttribute('style'),
            'fullHeight'    => $this->fullHeight,
        ];
    }
}

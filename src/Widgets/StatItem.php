<?php
declare(strict_types=1);

namespace Dcat\Admin\Widgets;

use D4T\Core\Enums\StyleClassType;
use Illuminate\Contracts\Support\Renderable;

class StatItem implements Renderable
{
    protected string $view = 'admin::widgets.stat-item';
    protected bool $inverse = false;
    protected bool $horizontalInverse = false;
    protected bool $withCard = false;
    protected ?StyleClassType $iconClass = StyleClassType::PRIMARY;
    protected ?StyleClassType $titleClass = StyleClassType::PRIMARY;
    protected ?StyleClassType $descriptionClass = StyleClassType::SECONDARY;

    public function __construct(
        protected ?string $icon,
        protected string $title,
        protected ?string $description = null,
        protected ?string $value = null)
    {
    }

    public function inverse() : static
    {
        $this->inverse = true;

        return $this;
    }

    public function horizontalInverse(): static
    {
        $this->horizontalInverse = true;

        return $this;
    }

    public function withCard() : static
    {
        $this->withCard = true;

        return $this;
    }

    public function iconClass(StyleClassType $value) : static
    {
        $this->iconClass = $value;

        return $this;
    }

    public function titleClass(StyleClassType $value) : static
    {
        $this->titleClass = $value;

        return $this;
    }

    public function descriptionClass(StyleClassType $value) : static
    {
        $this->descriptionClass = $value;

        return $this;
    }

    /**
     * Set title.
     *
     */
    public function title(string $title) : StatItem
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set contents.
     *
     */
    public function description(string $description) : StatItem
    {
        $this->description = $description;

        return $this;
    }

    /**
     */
    public function value(string $value) : StatItem
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Add icon.
     *
     */
    public function icon(string $icon) : StatItem
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     */
    public function render() : string
    {
        return view($this->view,[
            'title'                 => $this->title,
            'title_class'           => empty($this->titleClass) ? '' : $this->titleClass->value,
            'description'           => $this->description,
            'description_class'     => $this->descriptionClass,
            'icon'                  => $this->icon,
            'icon_class'            => empty($this->iconClass) ? '' : $this->iconClass->value,
            'value'                 => $this->value,
            'inverse'               => $this->inverse,
            'horizontal_inverse'    => $this->horizontalInverse,
            'with_card'             => $this->withCard
        ])->render();
    }
}

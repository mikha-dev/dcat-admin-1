<?php
declare(strict_types=1);

namespace Dcat\Admin\Widgets;

use D4T\Core\Enums\StyleClassType;
use Illuminate\Contracts\Support\Renderable;

class StatItem implements Renderable
{
    protected string $view = 'admin::widgets.stat-item';
    protected bool $inverse = false;
    protected bool $withCard = false;
    protected StyleClassType $iconClass = StyleClassType::PRIMARY;

    public function __construct(
        protected string $icon,
        protected string $title,
        protected ?string $description = null,
        protected ?string $value = null)
    {
    }

    public function inverse() : StatItem
    {
        $this->inverse = true;

        return $this;
    }

    public function withCard() : StatItem
    {
        $this->withCard = true;

        return $this;
    }

    public function iconClass(StyleClassType $value) : static
    {
        $this->iconClass = $value;

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
            'title'         => $this->title,
            'description'   => $this->description,
            'icon'          => $this->icon,
            'icon_class'    => $this->iconClass,
            'value'         => $this->value,
            'inverse'       => $this->inverse,
            'with_card'     => $this->withCard
        ])->render();
    }
}

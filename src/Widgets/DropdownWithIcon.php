<?php
declare(strict_types=1);

namespace Dcat\Admin\Widgets;

use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\DcatIcon;

class DropdownWithIcon extends Widget
{
    protected $view = 'admin::widgets.dropdown-with-icon';

    /** @var DropdownItem[] $items */
    protected array $items = [];

    protected ?string $icon = null;
    protected string $title = '';
    protected ?string $description = null;
    protected bool $click = FALSE;

    protected StyleClassType $iconClass = StyleClassType::LIGHT;
    protected StyleClassType $btnClass = StyleClassType::SECONDARY;
    protected StyleClassType $titleClass = StyleClassType::LIGHT;
    protected StyleClassType $descriptionClass = StyleClassType::LIGHT;

    /** @var DropdownItem[] $items */
    public function __construct($items = [], StyleClassType|null $class = null)
    {
        if( !is_null($class) ) {
            $this->btnClass = $class;
        }

        $this->items($items);

        return $this;
    }

    /** @var DropdownItem[] $items */
    public function items( array $items = []): static
    {
        $this->items = array_merge($this->items, $items);

        return $this;
    }

    public function title(string $title, StyleClassType|null $class = null): static
    {
        $this->title = $title;

        if( !is_null($class) ) {
            $this->titleClass = $class;
        }

        return $this;
    }

    public function description(string $value, StyleClassType|null $class = null): static
    {
        $this->description = $value;
        if( !is_null($class) ) {
            $this->descriptionClass = $class;
        }

        return $this;
    }

    public function icon(DcatIcon $icon, StyleClassType|null $class = null): static
    {
        $this->icon = $icon->_();
        if( !is_null($class) ) {
            $this->iconClass = $class;
        }

        return $this;
    }

    public function add(string $title, ?string $url = null, bool $disabled = FALSE, bool $hasDivider = FALSE): static
    {
        $this->items[] = new DropdownItem($title, $url, $hasDivider, $disabled);

        return $this;
    }

    public function render(): string
    {
        $this->addVariables([
            'items' => $this->items,
            'icon' => $this->icon,
            'iconClass' => $this->iconClass,
            'title' => $this->title,
            'titleClass' => $this->titleClass,
            'description' => $this->description,
            'descriptionClass' => $this->descriptionClass,
            'btnClass' => $this->btnClass,
        ]);

        return parent::render();
    }
}

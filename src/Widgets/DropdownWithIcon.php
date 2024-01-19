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

    protected string $id = '';
    protected ?string $icon = null;
    protected string $title = '';
    protected ?string $description = null;
    protected bool $click = FALSE;

    protected StyleClassType $iconClass = StyleClassType::PRIMARY;
    protected StyleClassType $btnClass = StyleClassType::SECONDARY;
    protected StyleClassType $titleClass = StyleClassType::PRIMARY;
    protected StyleClassType $descriptionClass = StyleClassType::PRIMARY;

    /** @var DropdownItem[] $items */
    public function __construct(
        array $items = [],
        string|null $id = null,
        StyleClassType|null $class = null
    )
    {
        if( !is_null($class) ) {
            $this->btnClass = $class;
        }

        if( is_null($id) ) {
            $this->id = "id-dropdown-with-icon-".md5(time().rand());
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
            'id'                => $this->id,
            'items'             => $this->items,
            'icon'              => $this->icon,
            'icon_class'        => $this->iconClass,
            'title'             => $this->title,
            'title_class'       => $this->titleClass,
            'description'       => $this->description,
            'description_class' => $this->descriptionClass,
            'btn_class'         => $this->btnClass,
        ]);

        return parent::render();
    }
}

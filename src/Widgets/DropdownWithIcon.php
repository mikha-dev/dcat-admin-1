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

    protected string $icon;
    protected string $title = '';
    protected ?string $description = null;
    protected bool $click = FALSE;

    protected StyleClassType $btnClass = StyleClassType::PRIMARY;
    protected StyleClassType $titleClass = StyleClassType::LIGHT;
    protected StyleClassType $descriptionClass = StyleClassType::SECONDARY;

    /** @var DropdownItem[] $items */
    public function __construct($items = [])
    {
        $this->icon = DcatIcon::SETTINGS();

        $this->items($items);

        return $this;
    }

    /** @var DropdownItem[] $items */
    public function items( array $items = []): static
    {
        $this->items = array_merge($this->items, $items);

        return $this;
    }

    public function title(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function description(string $value): static
    {
        $this->description = $value;

        return $this;
    }

    public function icon(DcatIcon $icon): static
    {
        $this->icon = $icon->_();

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
            'title' => $this->title,
            'description' => $this->description,
            'btnClass' => $this->btnClass,
            'titleClass' => $this->titleClass,
            'descriptionClass' => $this->descriptionClass
        ]);

        return parent::render();
    }
}

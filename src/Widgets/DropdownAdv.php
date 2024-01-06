<?php
declare(strict_types=1);

namespace Dcat\Admin\Widgets;

use Dcat\Admin\DcatIcon;
use Illuminate\Support\Str;
use Dcat\Admin\Enums\ButtonSizeType;
use Dcat\Admin\Enums\ButtonClassType;
use Dcat\Admin\Enums\DropdownDirectionType;

class DropdownAdv extends Widget
{
    protected $view = 'admin::widgets.dropdown-adv';

    /** @var DropdownItem[] $items */
    protected array $items = [];

    protected array $button = [];

    protected string $buttonId = '';

    protected bool $click = FALSE;

    protected DropdownDirectionType $direction = DropdownDirectionType::DOWN;

    protected bool $isRounded = false;

    /** @var DropdownItem[] $items */
    public function __construct($items = [])
    {
        $this->button = [
            'text' => NULL,
            'class' => ButtonClassType::SECONDARY(),
            'size_class' => ButtonSizeType::DEF,
            'icon' => NULL,
            'arrow' => FALSE,
            'split' => FALSE,
        ];

        $this->items($items);

        return $this;
    }

    /** @var DropdownItem[] $items */
    public function items( array $items = []): static
    {
        // //$this->items = array_merge($this->items, Helper::array($options));
        // if ($options instanceof Arrayable) {
        //     $options = $options->toArray();
        // }

        $this->items = array_merge($this->items, $items);

        return $this;
    }

    public function rounded(bool $value = true) : static {
        $this->isRounded = $value;

        return $this;
    }

    /**
     * Set the button text.
     */
    public function button(?string $text = null): static
    {
        $this->button['text'] = $text;
        return $this;
    }

    public function icon(DcatIcon $icon): static
    {
        $this->button['icon'] = $icon->_();
        return $this;
    }

    /**
     * Set the button class.
     */
    public function buttonClass(ButtonClassType $class, bool $isOutline = false): static
    {
        $this->button['class'] = $class->_($isOutline);
        return $this;
    }

    public function size(ButtonSizeType $class ): static
    {
        $this->button['size_class'] = $class->_();

        return $this;
    }

    public function hideArrow(): static
    {
        $this->button['arrow'] = TRUE;
        return $this;
    }

    public function toggleSplit(): static
    {
        $this->button['split'] = TRUE;
        return $this;
    }

    public function direction(DropdownDirectionType $direction = DropdownDirectionType::START): static
    {
        $this->direction = $direction;
        return $this;
    }

    public function up(): static
    {
        return $this->direction(DropdownDirectionType::UP);
    }

    public function down(): static
    {
        return $this->direction(DropdownDirectionType::DOWN);
    }

    public function start(): static
    {
        return $this->direction(DropdownDirectionType::START);
    }

    public function end(): static
    {
        return $this->direction(DropdownDirectionType::END);
    }

    /**
     * Add click event listener.
     */
    public function click(?string $defaultLabel = NULL): static
    {
        $this->click = TRUE;
        $this->buttonId = 'dropd-' . Str::random(8);
        if ($defaultLabel !== NULL) {
            $this->button($defaultLabel);
        }
        return $this;
    }

    public function getButtonId(): string
    {
        return $this->buttonId;
    }

    public function add(string $title, ?string $url = null, bool $disabled = FALSE, bool $hasDivider = FALSE): static
    {
        $this->items[] =  new DropdownItem($title, $url, $hasDivider, $disabled);

        return $this;
    }

    public function render(): string
    {
        $this->addVariables([
            'items' => $this->items,
            'button' => $this->button,
            'buttonId' => $this->buttonId,
            'click' => $this->click,
            'direction' => $this->direction->value,
            'rounded' => $this->isRounded
        ]);
        return parent::render();
    }
}

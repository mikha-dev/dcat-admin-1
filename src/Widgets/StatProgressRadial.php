<?php
declare(strict_types=1);

namespace Dcat\Admin\Widgets;

use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\Widgets\ApexCharts\RadialBarChart;
use Illuminate\Contracts\Support\Renderable;

class StatProgressRadial implements Renderable
{
    protected string $view = 'admin::widgets.stat-progress-radial';
    protected ?string $description = null;
    protected bool $withCard = false;

    public function __construct(
        protected string $icon,
        protected string $title,
        protected int|float $value,
        protected string $valueTitle,
        protected StyleClassType $class = StyleClassType::PRIMARY,
    ) {}

    public function withCard() : static
    {
        $this->withCard = true;

        return $this;
    }

    public function class(StyleClassType $class) : static
    {
        $this->class = $class;

        return $this;
    }

    public function title(string $title) : static
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set contents.
     *
     */
    public function description(string $description) : static
    {
        $this->description = $description;

        return $this;
    }

    /**
     */
    public function value(int|float $value) : static
    {
        $this->value = $value;

        return $this;
    }

    public function valueTitle(string $title) : static
    {
        $this->valueTitle = $title;

        return $this;
    }

    /**
     * Add icon.
     *
     */
    public function icon(string $icon) : static
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     */
    public function render() : string
    {
        $progress = new RadialBarChart();
        $progress->showLabel();
        $progress->value((int)$this->value);
        $progress->hollowSize(60);
        $progress->height(150);
        $progress->startAngle(-90);
        $progress->endAngle(90);
        $progress->padding([
            'top' => -10,
        ]);
        $progress->fontSize(16);
        $progress->valueOffsetY(-2);

        return view($this->view,[
            'title'        => $this->title,
            'description'      => $this->description,
            'icon'         => $this->icon,
            'value_title'        => $this->valueTitle,
            'progress' => $progress->render(),
            'class' => $this->class->value,
            'with_card'        => $this->withCard
        ])->render();
    }
}

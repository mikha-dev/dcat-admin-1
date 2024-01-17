<?php
declare(strict_types=1);
namespace Dcat\Admin\Widgets\ApexCharts;

class RadialBarChart extends ApexChartBase
{

    protected int $hollowSize = 70;
    protected int $offset = 0;
    protected int $height = 380;
    protected int $fontSize = 36;
    protected int $startAngle = -180;
    protected int $endAngle = 180;
    protected int $valueOffsetY = 14;
    protected bool $showLabel = false;

    protected array $padding = [
        'top' => -75,
        'bottom' => -75,
        'left' => -20,
        'right' => -20
    ];

    public function __construct($selector = null, array $options = [])
    {
        parent::__construct($selector, $options);
    }

    public function showLabel(bool $value = true): static
    {
        $this->showLabel = $value;

        return $this;
    }

    public function hollowSize(int $size): static
    {
        $this->hollowSize = $size;

        return $this;
    }

    public function height(int $value): static
    {
        $this->height = $value;

        return $this;
    }

    public function fontSize(int $px): static
    {
        $this->fontSize = $px;

        return $this;
    }

    public function value(int $value): static
    {
        $this->series([$value]);

        return $this;
    }

    public function offset(int $value): static
    {
        $this->offset = $value;

        return $this;
    }

    public function padding(array $value): static
    {
        $this->padding = $value;

        return $this;
    }

    public function startAngle(int $value): static
    {
        $this->startAngle = $value;

        return $this;
    }

    public function endAngle(int $value): static
    {
        $this->endAngle = $value;

        return $this;
    }

    public function valueOffsetY(int $value): static
    {
        $this->valueOffsetY = $value;

        return $this;
    }

    protected function setupOptions(): void
    {
        $this->chart([
            'type' => 'radialBar',
            'height' => $this->height,
            'sparkline' => [
                'enabled' => true
            ],
        ]);

        $this->options([
            'grid' => [
                'padding' => $this->padding
            ],
            'plotOptions' => [
                'radialBar' => [
                    'dataLabels' => [
                        'show' => $this->showLabel,
                        'name' => [
                            'show' => false,
                        ],
                        'value' => [
                            'offsetY' => $this->valueOffsetY,
                            'fontSize' => $this->fontSize.'px',
                            'show' => true,
                        ]
                    ],
                    'hollow' => [
                        'size' => $this->hollowSize . '%',
                    ],
                    'startAngle' => $this->startAngle,
                    'endAngle' => $this->endAngle,
                ],
            ],
        ]);
    }

    public function render(): string
    {
        $this->setupOptions();

        return parent::render();
    }
}

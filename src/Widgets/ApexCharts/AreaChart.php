<?php

declare(strict_types=1);

namespace Dcat\Admin\Widgets\ApexCharts;

use Dcat\Admin\Widgets\ApexCharts\ApexChartBase;

class AreaChart extends Chart
{
    protected int $offset = 0;
    protected int $height = 380;
    protected int $fontSize = 36;

    protected bool $isSparkline = false;

    protected array $breakpoints = [
        'sm' => 576,
        'md' => 768,
        'lg' => 992,
        'xl' => 1200,
        'xxl' => 1400
    ];

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

    public function value(array $value): static
    {
        $this->series($value);

        return $this;
    }

    public function offset(int $value): static
    {
        $this->offset = $value;

        return $this;
    }

    public function breakpoints(array $value): static
    {
        $this->breakpoints = array_merge($this->breakpoints, $value);

        return $this;
    }

    public function padding(array $value): static
    {
        $this->padding = $value;

        return $this;
    }

    public function isSparkline(): static
    {
        $this->isSparkline = true;

        return $this;
    }

    protected function setupOptions(): void
    {
        $this->chart([
            'type' => 'area',
            'height' => $this->height,
            'toolbar' => [
                'show' => false
            ],
            'sparkline' => [
                'enabled' => $this->isSparkline
            ],
        ]);

        $this->options([
            'grid' => [
                'show' => false
            ],
            'plotOptions' => [
                'bar' => [
                    'columnWidth' => '45%',
                    'distributed' => true
                ],
            ],
        ]);

        $breakpoints = [];
        foreach ($this->breakpoints as $breakpoint => $height) {
            $breakpoints[] = [
                'breakpoint' => $this->breakpoints[$breakpoint],
                'options' => [
                    'chart' => [
                        'height' => $height
                    ]
                ]
            ];
        }

        $this->responsive($breakpoints);
    }

    public function render(): string
    {
        $this->setupOptions();

        return parent::render();
    }
}

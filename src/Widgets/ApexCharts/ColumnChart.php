<?php

namespace Dcat\Admin\Widgets\ApexCharts;

use Dcat\Admin\Widgets\ApexCharts\ApexChartBase;

class ColumnChart extends ApexChartBase
{
    protected int $offset = 0;
    protected int $height = 380;
    protected int $fontSize = 36;

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

    public function padding(array $value): static
    {
        $this->padding = $value;

        return $this;
    }

    protected function setupOptions(): void
    {
        $this->chart([
            'type' => 'bar',
            'height' => $this->height,
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
            'dataLabels' => [
                'enabled' => false
            ],
            'legend' => [
                'show' => false
            ],
            'xaxis' => [
                'labels' => [
                    'show' => false
                ]
            ],
            'yaxis' => [
                'show' => false
            ],
            'tooltip' => [
                'enabled' => false
            ]
        ]);

        $this->option('chart.toolbar', ['show' => false]);
    }

    public function render(): string
    {
        $this->setupOptions();

        return parent::render();
    }
}

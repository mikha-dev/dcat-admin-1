<?php

namespace Dcat\Admin\Widgets\ApexCharts;

use Dcat\Admin\Support\Helper;

class Chart extends ApexChartBase
{

    public function title(string|array $title) :static
    {
        if (is_string($title)) {
            $options = ['text' => $title];
        } else {
            $options = Helper::array($title);
        }

        $this->options['title'] = $options;

        return $this;
    }

    public function xaxis(array $value) : static
    {
        $this->options['xaxis'] = Helper::array($value);

        return $this;
    }

    public function yaxis(array $value) : static
    {
        $this->options['yaxis'] = Helper::array($value);

        return $this;
    }

    public function tip(array $value) : static
    {
        $this->options['tooltip'] = Helper::array($value);

        return $this;
    }
}

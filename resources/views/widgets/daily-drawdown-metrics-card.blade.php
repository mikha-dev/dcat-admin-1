<style>
    .daily-drawdown-metrics-card .title{
        font-size: 20px;
        font-weight: 700;
    }
    .daily-drawdown-metrics-card .value{
        font-size: 20px;
        font-weight: 400;
    }
    .daily-drawdown-metrics-card .chart-content{
        position: absolute;
        left: 50%;
        transform: translatex(-50%);
        bottom: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 20px;
        font-weight: 400;
        line-height: 21px;
    }
    .daily-drawdown-metrics-card .chart-content .value,.daily-drawdown-metrics-card .chart-content .text{
        display: inline-block;
        white-space: nowrap;
    }
</style>

<div class="d-flex">
    <div class="flex-grow-1 w-100 d-flex flex-column justify-content-center">
        <h3 class="title mb-0">{{ $title }}</h3>
        <div class="d-flex justify-content-between">
            <h3 class="value text-nowrap mb-0">{{ $value }}{!! $tool !!}</h3>{!! $badge !!}
        </div>
    </div>
    <div class="flex-grow-0">{!! $bar !!}<div class="chart-content"><span class="value">{{ $chart_value }}</span><span class="text">{{ $chart_text }}</span></div> </div>
</div>

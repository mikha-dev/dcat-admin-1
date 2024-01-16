<style>
.steps{
    margin-bottom: 18px;
    border-radius: 20px;
    background: #2E2E2E;
    overflow: hidden;
}

.steps .step{
    padding: 18px 15px;
    gap:20px;
    flex-basis: 100%;
}

.steps .step-index{
    width: 56px;
    height: 56px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFF;
    font-size: 22px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    background: linear-gradient(79deg, #E83CF4 0.92%, #5AC6DA 97.8%);
    border-radius: 50%;
}

.steps .step-title{
    color: #FFF;
    font-size: 22px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    margin: 0;
}

.steps .step-name{
    color: #FFF;
    font-size: 22px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    margin: 0;
}

.steps .active{
    position: relative;
    margin-right: 55px;
    background: linear-gradient(79deg, #E83CF4 0.92%, #5AC6DA 97.8%);
    border-radius: 20px 0 0 20px;
}

.steps .active:after{
    width: 55px;
    height: 100%;
    content: " ";
    background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="55" height="93" viewBox="0 0 55 93" fill="none"><path d="M49.0858 32.4345L22.8707 5.93451C19.1139 2.13693 13.9968 0 8.65496 0H0V93H8.65233C13.9941 93 19.1139 90.8631 22.8707 87.0655L49.0858 60.5655C56.7946 52.7729 56.7946 40.2271 49.0858 32.4345Z" fill="%235AC6DA"/></svg>');    position: absolute;
    background-size: cover;
    right: -55px;
    background-position: center right;
    top: 0;
}

.steps .active .step-index{
    background: #fff;
    color: #2E2E2E;
}
</style>
<div class='steps d-flex'>
    @foreach($items as $idx => $item)
        <div id="step_{{ $item['id'] }}" class='step d-flex {{ $idx == $active_idx ? 'active' : '' }}'>
            @if(empty($item['icon']))<div class='step-index'>{{ $item['index'] }}</div>
            @else
                {!! $item['icon'] !!}
            @endif
            <div>
                <p class='step-title'>{{ $item['title'] }}</p>
                <p class='step-name'>{{ $item['description'] }}</p>
            </div>
        </div>
    @endforeach
</div>

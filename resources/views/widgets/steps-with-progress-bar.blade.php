<div class="d-flex flex-lg-row flex-column align-items-stretch w-100">
    @foreach($items as $idx => $item)
        <div class="list-group list-group-horizontal w-100 {{ $idx == 0 ? '' : 'ms-lg-2 mt-2 mt-lg-0' }} bg-{{ $bg_class }}">

            @if($item['href'])
            <a href="{{ $item['href'] }}" class="d-flex list-group-item list-group-item-action {{ $item['active'] ? 'border-'.$active_class : 'border-transparent' }}">
            @else
            <div class="d-flex list-group-item w-100 {{ $item['active'] ? 'border-'.$active_class : 'border-transparent' }}">
            @endif
                <div>
                    <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-{{ $item['icon_class'] }}">
                            {!! $item['icon'] !!}
                        </span>
                    </div>
                </div>
                <div class="d-flex flex-column flex-grow-1 justify-content-center">
                    <div class="d-flex justify-content-between mb-1">
                        <div class="d-flex align-items-center">
                            <h6 class="m-0">{{ $item['title'] }}</h6>
                        </div>
                        @if($item['description'])
                        <div>
                            <small class="m-0">{{ $item['description'] }}</small>
                        </div>
                        @endif
                    </div>
                    <div class="progress {{ $item['disabled'] ? 'bg-'.$disabled_class : '' }}" style="height: 5px;">
                        <div
                            class="progress-bar bg-{{ $active_class }}"
                            role="progressbar"
                            style="width: {{ $item['percent'] }}%;"
                            aria-valuenow="{{ $item['percent'] }}"
                            aria-valuemin="0"
                            aria-valuemax="100"
                        ></div>
                    </div>
                </div>
            @if($item['href'])
            </a>
            @else
            </div>
            @endif

        </div>
    @endforeach
</div>

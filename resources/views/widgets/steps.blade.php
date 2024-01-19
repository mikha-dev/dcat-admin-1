<div class="list-group list-group-horizontal-md text-center {{ is_null($class_ext) ? '' : $class_ext }}">
    @foreach($items as $idx => $item)
    <div
        id="step_{{ $item['id'] }}"
        class="list-group-item list-group-item-action d-flex justify-content-between {{ $idx == $active_idx ? 'bg-label-primary' : 'bg-transparent' }}"
    >
        <div class="li-wrapper d-flex justify-content-start align-items-center">
            @if($item['icon'])
                {!! $item['icon'] !!}
            @else
            <div class="avatar avatar-lg me-3">
                <span class="avatar-initial rounded-circle {{ $idx == $active_idx ? 'bg-primary' : 'bg-label-secondary' }}">
                    {{ $item['index'] }}
                </span>
            </div>
            @endif
            <div class="list-content text-start">
                <p class="m-0 mb-1 {{ $idx == $active_idx ? 'text-primary' : 'text-secondary' }}">{{ $item['description'] }}</p>
                <h4 class="m-0 {{ $idx == $active_idx ? 'text-primary' : 'text-secondary' }}">{{ $item['title'] }}</h4>
            </div>
        </div>
    </div>
    @endforeach
</div>


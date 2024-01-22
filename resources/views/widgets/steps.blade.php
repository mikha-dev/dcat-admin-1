<div class="list-group list-group-horizontal-md text-center {{ is_null($class_ext) ? '' : $class_ext }}">
    @foreach($items as $idx => $item)
    <div
        id="step_{{ $item['id'] }}"
        class="list-group-item list-group-item-action d-flex justify-content-between {{ $idx == $active_idx ? 'bg-label-'.$step_active_class : 'bg-label-'.$step_inactive_class }}"
    >
        <div class="li-wrapper d-flex justify-content-start align-items-center">
            @if($item['icon'])
                {!! $item['icon'] !!}
            @else
            <div class="avatar avatar-lg me-3">
                <span class="avatar-initial rounded-circle {{ $idx == $active_idx ? 'bg-'.$step_active_class : 'bg-'.$step_inactive_class }}">
                    {{ $item['index'] }}
                </span>
            </div>
            @endif
            <div class="list-content text-start">
                <p class="m-0 mb-1 {{ $idx == $active_idx ? 'text-'.$step_active_class : 'text-'.$step_inactive_class }}">{{ $item['description'] }}</p>
                <h4 class="m-0 {{ $idx == $active_idx ? 'text-'.$step_active_class : 'text-'.$step_inactive_class }}">{{ $item['title'] }}</h4>
            </div>
        </div>
    </div>
    @endforeach
</div>


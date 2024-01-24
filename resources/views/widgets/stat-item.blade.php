@if($with_card)
    <div class="card mx-2 my-2">
        @endif
        <div class="d-flex px-2 py-2 {{ $horizontal_inverse ? 'flex-row-reverse' : 'flex-row' }}">
            @if($icon)
            <div class="avatar flex-shrink-0 {{ $horizontal_inverse ? 'ms-3' : 'me-3' }}">
                <span class="avatar-initial rounded bg-label-{{ $icon_class }}">{!! $icon !!}</span>
            </div>
            @endif

            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="d-inline-flex me-2 {{ $inverse ? 'flex-column-reverse' : 'flex-column' }}">
                    <h6 class="mb-0 text-{{ $title_class }}">{{ $title }}</h6>
                    @if($description)<small class="text-{{ $description_class }}">{{ $description }}</small>@endif
                </div>
                @if($value)
                    {!! $value !!}
                @endif
            </div>
        </div>
        @if($with_card)
    </div>
@endif

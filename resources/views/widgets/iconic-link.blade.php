<a href="{{ $href }}" class="@if($as_button) btn btn-outline-{{ $class  }} @else icon-link text-{{ $class  }} @endif">
    @if($icon)
    <span class="@if($as_button) me-1 @endif">
        {!! $icon !!}
    </span>
    @endif
    {{ $text }}
</a>

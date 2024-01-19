<div class="badge bg-label-{{ $class }} {{ $fullWidth ? 'w-100 text-truncate' : '' }}">
    <i class="{!! $icon !!} text-{{ $class }} {{ empty($title) ? '' : 'me-1' }}"></i>
    @if($title)
    <span class="text-{{ $class }}">
        {!! $title !!}
    </span>
    @endif
</div>

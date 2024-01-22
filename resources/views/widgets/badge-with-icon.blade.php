<div class="badge bg-label-{{ $bg_class }} {{ $full_width ? 'w-100 text-truncate' : '' }}">
    <i class="{!! $icon !!} text-{{ $text_class }} {{ empty($title) ? '' : 'me-1' }}"></i>
    @if($title)
    <span class="text-{{ $text_class }}">
        {!! $title !!}
    </span>
    @endif
</div>

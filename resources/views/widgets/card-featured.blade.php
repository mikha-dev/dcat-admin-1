<div class="card {{ $fullHeight ? 'h-100' : '' }} {{ empty($class) ? '' : 'bg-'.$class }}" style="{{ $style }}">
    @if($headerContent)
        <div class="card-header">
            {!! $headerContent !!}
        </div>
    @endif
    <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0">
        @if ($icon)
        <div class="d-inline-flex flex-column justify-content-center px-4">
            {!! $icon !!}
        </div>
        @endif
        <div class="card-body d-flex align-items-left flex-column">
            @if ($title)
            <p class="card-title mb-3 text-left">
                {{ $title }}
            </p>
            @endif
            <div class="d-flex align-items-center justify-content-between">
                @foreach($features as $feature)
                    {!! $feature !!}
                @endforeach
            </div>
        </div>
    </div>
    @if(count($footerLinks) > 0)
    <div class="card-footer d-flex align-items-center">
        <div class="btn-group w-100">
        @foreach($footerLinks as $link)
            {!! $link !!}
        @endforeach
        </div>
    </div>
    @endif
</div>

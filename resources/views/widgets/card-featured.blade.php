<div class="card {{ $full_height ? 'h-100' : '' }} {{ empty($class) ? '' : 'bg-'.$class }}" style="{{ $style }}">
    @if($header_content)
        <div class="card-header">
            {!! $header_content !!}
        </div>
    @endif
    <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0">
        @if ($image)
            <div class="d-inline-flex flex-column justify-content-center ps-4">
                {!! $image !!}
            </div>
        @endif
        <div class="card-body d-flex align-items-left flex-column">
            @if ($title)
                <p class="card-title mb-3 text-left">
                    {{ $title }}
                </p>
            @endif
            <div class="row">
                @foreach($features as $feature)
                    <div class="col-12 col-md-6 col-lg-3 py-1">
                        {!! $feature !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @if(count($footer_links) > 0)
        <div class="card-footer d-flex align-items-center">
            <div class="btn-group w-100">
                @foreach($footer_links as $link)
                    {!! $link !!}
                @endforeach
            </div>
        </div>
    @endif
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                @if ($icon)
                    <div class="badge bg-label-secondary">
                        <i class="{!! $icon !!} text-secondary"></i>
                    </div>
                @endif
                @if ($title)
                <div class="d-block">
                    <small class="text-body-secondary">{!! $title !!}</small>
                </div>
                @endif
            </div>

            <div class="col-6">
                @if ($tool)
                    {!! $tool !!}
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="d-flex flex-column justify-content-end h-100">
                    <div class="pb-3">
                        <h3 class="m-0 p-0">
                            {!! $value !!}
                        </h3>
                    </div>
                    <p class="text-muted m-0 p-0">
                        {!! $description !!}
                    </p>
                </div>
            </div>
            <div class="col-7">
                {!! $content !!}
            </div>
        </div>
    </div>
</div>

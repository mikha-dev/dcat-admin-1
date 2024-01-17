<div id="{{ $id  }}" class="card h-100">
    <div class="card-body">
        <div class="d-flex flex-column justify-content-between h-100">
            <div class="row">
                <div class="col-6">
                    @if ($icon)
                        {!! $icon !!}
                    @endif
                    @if ($title)
                    <div class="d-block">
                        <small>{!! $title !!}</small>
                    </div>
                    @endif
                </div>

                <div class="col-6">
                    <div class="d-flex justify-content-end">
                        @if ($tool)
                            {!! $tool !!}
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="d-flex flex-column justify-content-end h-100">
                        <div class="pb-4">
                            <h3 class="m-0 p-0">
                                {!! $value !!}
                            </h3>
                        </div>
                        <p class="text-muted m-0 p-0">
                            {!! $target !!}
                        </p>
                    </div>
                </div>
                <div class="col-7">
                    {!! $content !!}
                </div>
            </div>
        </div>
    </div>
</div>

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
                        <small class="text-{{ $title_class }}">{!! $title !!}</small>
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
                    <div class="d-flex flex-column justify-content-center h-100">
                        <h3 class="m-0 p-0 text-{{ $value_class }}">
                            {!! $value !!}
                        </h3>
                        @if($target)
                        <p class="text-muted m-0 p-0 pt-4">
                            {!! $target !!}
                        </p>
                        @endif
                    </div>
                </div>
                <div class="col-7">
                    {!! $content !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-row align-items-stretch w-100">
    @foreach($items as $idx => $item)
        <div class="list-group list-group-horizontal w-100 {{ $idx == 0 ? '' : 'ms-2' }}">
            <a href="#" class="d-flex list-group-item list-group-item-action">
                <div>
                    <div class="avatar flex-shrink-0 me-3">
                    <span class="avatar-initial rounded bg-label-primary">
                        <i class="fa fa-calendar"></i>
                    </span>
                    </div>
                </div>
                <div class="d-flex flex-column flex-grow-1 justify-content-center">
                    <div class="d-flex justify-content-between mb-1">
                        <div class="d-flex align-items-center">
                            <h6 class="m-0">{{ $item['title'] }}</h6>
                        </div>
                        @if($item['description'])
                        <div>
                            <small class="m-0">{{ $item['description'] }}</small>
                        </div>
                        @endif
                    </div>
                    <div class="progress" style="height: 5px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 95%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>

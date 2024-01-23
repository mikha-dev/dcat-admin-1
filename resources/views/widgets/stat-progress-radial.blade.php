@if($with_card)
<div class="card my-2 {{ $full_height ? 'h-100' : '' }}">
@endif
<div class="row px-2 py-2">
    <div class="d-flex flex-column align-items-center w-100">
        {!! $progress !!}
        <h5 class="text-bold text-center m-0 mt-2 mb-2">{{ $title }}</h5>
        <h6 class="m-0 mb-2">{{$value_title}}</h6>

        <div class="flex-shrink-0">
            <span class="avatar-initial rounded bg-label-{{ $class }} px-2 py-1">{!! $icon !!}</span>
        </div>
    </div>
</div>
@if($with_card)
</div>
@endif

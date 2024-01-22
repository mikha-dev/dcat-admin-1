@if($with_card)
<div class="card mx-2 my-2">
@endif
<div class="row px-2 py-2">
    <div class="d-flex flex-column align-items-center w-100">
        {!! $progress !!}
        <h5 class="text-bold m-0 mt-2 mb-2">{{ $title }}</h5>
        <h6 class="m-0 mb-2">{{$value_title}}</h6>

        <div class="avatar flex-shrink-0">
            <span class="avatar-initial rounded bg-label-{{ $class }}">{!! $icon !!}</span>
        </div>

    </div>
</div>
@if($with_card)
</div>
@endif

<div>
    <i class="{{ $icon }}"></i>
    <span class="dropdown" style="display:inline-block">
        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
            {{ $title }}
        </a>
        <ul class="dropdown-menu">
            @foreach($items as $item)
                @if($item->hasDivider)
                    <hr class="dropdown-divider">
                @endif
                <li><a class="dropdown-item {{$item->isDisabled ? 'disabled' : ''}}"
                        href="{{ $item->link ?? '#' }}">{{$item->value}}</a>
                </li>
            @endforeach
        </ul>
    </span>
</div>

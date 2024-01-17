@foreach($tabs as $id => $tab)
    <li class="nav-item" >
        <a href="{{ $tab['href'] }}" class=" nav-link  {{ $tab['active'] ? 'active' : '' }}">{!! $tab['title'] !!}</a><p>{!! $tab['description'] !!}</p><p>{!! $tab['progress'] !!}</p>
    </li>
@endforeach

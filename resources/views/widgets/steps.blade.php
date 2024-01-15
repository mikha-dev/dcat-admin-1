<div>
    <ul>
    @foreach($items as $id => $item)
        <li>
            id: {!! $id !!} active: {!! $item['active'] !!} icon: {!! $item['icon'] !!} title:  {!! $item['title'] !!} description{!! $item['description'] !!}
        </li>
    @endforeach
    </ul>
</div>

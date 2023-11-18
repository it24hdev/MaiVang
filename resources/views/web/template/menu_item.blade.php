@foreach($child as $item)
    <li>
        <a href="{{$item->redirect}}">{{$item->name}}</a>
        @if($item->Children->count()>0)
        <ul class="sub-menu">
                @include('web.template.menu_item', ['child' => $item->Children])
        </ul>
        @endif
    </li>
@endforeach

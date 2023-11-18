@foreach($child as $item)
    <li>
        <div class="child hide-child">
            <span>{{$item->name}}</span>
        </div>
        <ul>
            @if($item->children->count()>0)
                @include('web.template.template_child_offer', ['child' => $item->children])
            @else
                @foreach($item->Products as $product)
                    <li>
                        <div class="child hide-child btn-modal-order-product" data-value="{{$product->name}}">
                            <div class="d-block">
                                <span>{{$product->name}}</span><br>
                                <span>({{$product->price_range}}{{$product->warranty ? ' - '.$product->warranty:''}})</span>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </li>
@endforeach

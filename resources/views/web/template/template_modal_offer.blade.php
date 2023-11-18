<div class="modal modal-offer d-none">
    <div class="modal-background"></div>
    <div class="modal-content-content size_large">
        <div class="close_modal"><i class="fa fa-times" id="close-offer"></i></div>
        <div class="content-area">
            <div class="box-offer">
                <h3 class="text-center">Báo giá</h3>
                <ol class="table-offer">
                    @foreach($quotes as $item)
                            <li>
                                <div class="child show-child parents_offer">
                                    <div class="d-block">
                                        <span>{{$item->name}}</span>
                                    </div>
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
                </ol>
            </div>
        </div>
    </div>
</div>

@if ($paginator->hasPages())
    <div class="pagination p13 text-center mt-4">
        <ul class="mx-auto">
            @if (!$paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}" class="prev">
                    <li>Trước</li>
                </a>
            @endif
            @foreach ($elements as $item)
                @if(is_array($item))
                    @foreach($item as $page => $url)
                        @if($page == $paginator->currentPage())
                            <a class="is-active" href="javascript:void(0);">
                                <li>{{$page}}</li>
                            </a>
                        @else
                            <a href="{{$url}}">
                                <li>{{$page}}</li>
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="next">
                    <li>Sau</li>
                </a>
            @endif
        </ul>
    </div>
@endif

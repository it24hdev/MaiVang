@if ($paginator->hasPages())
    <div class="site-pagination s-p-center">
        <ul class="pagination flex-wrap justify-content-center">
            @if (!$paginator->onFirstPage())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1"><i
                            class="fa fa-chevron-left"></i></a>
                </li>
            @endif
            @foreach ($elements as $item)
                @if(is_array($item))
                    @foreach($item as $page => $url)
                        @if($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link" href="javascript:void(0);">{{$page}} <span class="sr-only">(current)</span></a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{$url}}">{{$page}}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-chevron-right"></i></a>
                </li>
            @endif
        </ul>
    </div>
@endif

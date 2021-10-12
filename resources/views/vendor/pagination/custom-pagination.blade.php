@if ($paginator->hasPages())
    <ul class="pagination">
       
        @if ($paginator->onFirstPage())
            {{-- JIKA SUDAH DI PAGE AWAL MAKA &LAQUO HILANG --}}
        @else
            <li class="page-item">
                <a class="link-pagination" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        @endif
      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item"><span class="link-pagination active">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="link-pagination" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="link-pagination" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        @else
            {{-- JIKA SUDAH DI PAGE AKHIR MAKA &RAQUO HILANG --}}
        @endif
    </ul>
@endif 

    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
  @if ($paginator->onFirstPage())
            <li class="d-none page-item"><span><i class="bi bi-chevron-double-left color1"></i></span></li>
        @else
            <li class='page-item'><a class='page-link' href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="bi bi-chevron-double-left color1"></i></a></li>
        @endif
        @foreach ($elements as $element)
           
           @if (is_string($element))
               <li class="page-item"><span class='page-link'>{{ $element }}</span></li>
           @endif


          
           @if (is_array($element))
               @foreach ($element as $page => $url)
                   @if ($page == $paginator->currentPage())
                       <li class="active my-active page-item"><span class='page-link'>{{ $page }}</span></li>
                   @else
                       <li><a class='page-link' href="{{ $url }}">{{ $page }}</a></li>
                   @endif
               @endforeach
           @endif
       @endforeach
       @if ($paginator->hasMorePages())
            <li class='page-item'><a class='page-link' href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="bi bi-chevron-double-right color2"></i></a></li>
        @else
            <li class="d-none page-item"><span class='page-link'><i class="bi bi-chevron-double-right color2"></i></span></li>
        @endif
  </ul>
</nav>


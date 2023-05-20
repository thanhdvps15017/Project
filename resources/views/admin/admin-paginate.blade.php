@if ($paginator->hasPages())
<div class="col-md-12">
  <nav aria-label="Page navigation">
      <ul class="pagination justify-content-start">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled page-item" aria-disabled="true">
                    <span aria-hidden="true" class="page-link">&lt;</span>
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">&lt;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    {{-- <li class="page-item"><a class="page-link" href="#">1</a></li> --}}
                    <li class="disabled page-item" aria-disabled="true">
                      <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active page-item" aria-current="page">
                              <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="active page-item">
                              <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next">&gt;</a>
                </li>
            @else
                <li class="disabled page-item" aria-disabled="true">
                    <span aria-hidden="true" class="page-link">&gt;</span>
                </li>
            @endif
          </ul>
        </nav>
      </div>
@endif

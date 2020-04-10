@if ($paginator->hasPages())
<nav class="blog-pagination justify-content-center d-flex">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a class="page-link" aria-label="Previous" aria-hidden="true">
                <i class="ti-angle-left"></i>
            </a>
        </li>
        @else
        <li class="page-item" aria-disabled="true">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev"
                aria-label="@lang('pagination.previous')">
                <i class="ti-angle-left"></i>
            </a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="page-item disabled" aria-disabled="true"><a class="page-link">{{ $element }}</a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item active" aria-current="page"><a class="page-link">{{ $page }}</a></li>
        @else
        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }} <a class="sr-only">(current)</a></a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                aria-label="@lang('pagination.next')"><i class="ti-angle-right"></i></a>
        </li>
        @else
        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <a class="page-link" aria-hidden="true">
                <i class="ti-angle-right"></i>
            </a>
        </li>
        @endif
    </ul>
</nav>
@endif

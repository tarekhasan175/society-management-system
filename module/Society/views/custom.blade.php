@if ($paginator->hasPages())
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            {{-- First Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&laquo;&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url(1) }}" aria-label="First">&laquo;&laquo;</a>
                </li>
            @endif

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @php
                $current = $paginator->currentPage();
                $last = $paginator->lastPage();

                // Always show first 3 pages and last 3 pages
                $start = max(1, $current - 1);
                $end = min($last, $current + 1);

                if ($current > 3) {
                    $start = min($start, $last - 1);
                }

                if ($current <= $last - 2) {
                    $end = max($end, 2);
                }
            @endphp

            {{-- Show the calculated pages --}}
            @for ($page = $start; $page <= $end; $page++)
                @if ($page == $current)
                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
                @endif
            @endfor

            {{-- Show ellipsis if current page is beyond the third page --}}
            @if ($last > 8 && $end < $last - 2)
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
            @endif

            {{-- Show the last three pages --}}
            @for ($page = max($last - 2, $end + 1); $page <= $last; $page++)
                @if ($page == $current)
                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
                @endif
            @endfor

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&raquo;</span>
                </li>
            @endif

            {{-- Last Page Link --}}
            @if ($paginator->currentPage() == $paginator->lastPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&raquo;&raquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="Last">&raquo;&raquo;</a>
                </li>
            @endif
        </ul>
    </nav>
@endif

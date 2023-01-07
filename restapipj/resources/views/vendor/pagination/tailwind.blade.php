@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">

    <div class="pagination_layout">
        <div>
            <p>
                <span>
                    {!! __('全') !!}
                    {{ $paginator->total() }}
                    {!! __('件中') !!}
                </span>
                @if ($paginator->firstItem())
                <span>
                    {{ $paginator->firstItem() }}
                </span>
                {!! __('-') !!}
                <span>
                    {{ $paginator->lastItem() }}
                </span>
                @else
                {{ $paginator->count() }}
                @endif
                {!! __('件') !!}
            </p>
        </div>

        <div class="pagination">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    <div class="page"  aria-hidden="true"><</div>
                </span>
                @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous') }}">
                    <div class="page"><</div> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <span aria-disabled="true">
                    <span>{{ $element }}</span>
                </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <span aria-current="page">
                    <div class="page_select">{{ $page }}</div>
                </span>
                @else
                <a href="{{ $url }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}" class="page">
                    {{ $page }}
                </a>
                @endif
                @endforeach
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ __('pagination.next') }}">
                    <div class="page">></div>
                </a>
                @else
                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <span aria-hidden="true">
                        <div class="page">></div>
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </span>
                </span>
                @endif
            </span>
        </div>
    </div>
</nav>
@endif
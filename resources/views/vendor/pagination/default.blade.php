@if ($paginator->hasPages())
    <nav class="flex items-center justify-between mb-4">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="text-gray-500 cursor-not-allowed rounded-md px-3 py-2 bg-gray-100">Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="rounded-md px-3 py-2 bg-laravel text-white hover:bg-laravel-dark">
                Previous
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="rounded-md px-3 py-2 bg-laravel text-white hover:bg-laravel-dark">
                Next
            </a>
        @else
            <span class="text-gray-500 cursor-not-allowed rounded-md px-3 py-2 bg-gray-100">Next</span>
        @endif
    </nav>
@endif

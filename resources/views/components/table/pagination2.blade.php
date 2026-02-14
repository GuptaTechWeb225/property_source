@props([
'data' => [],
])
@if($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="table_pagination2 d-flex align-items-center justify-content-between flex-wrap">
        <!-- Previous Page Button -->
        @if ($data->onFirstPage())
            <button class="navigation_button d-inline-flex align-items-center gap-2" disabled>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.8334 7.00033H1.16669M1.16669 7.00033L7.00002 12.8337M1.16669 7.00033L7.00002 1.16699"
                          stroke="#344054" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Previous</span>
            </button>
        @else
            <a href="{{ $data->previousPageUrl() }}" class="navigation_button d-inline-flex align-items-center gap-2">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.8334 7.00033H1.16669M1.16669 7.00033L7.00002 12.8337M1.16669 7.00033L7.00002 1.16699"
                          stroke="#344054" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Previous</span>
            </a>
        @endif

    <!-- Page Links -->
        <ul class="pagination_count">
            @foreach ($data->links()->elements[0] as $page => $url)
                @if ($page == $data->currentPage())
                    <li><a class="pagination_count_link active" href="#">{{ $page }}</a></li>
                @else
                    <li><a class="pagination_count_link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        </ul>

        <!-- Next Page Button -->
        @if ($data->hasMorePages())
            <a href="{{ $data->nextPageUrl() }}" class="navigation_button d-inline-flex align-items-center gap-2">
                <span>Next</span>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.16666 7.00033H12.8333M12.8333 7.00033L7 1.16699M12.8333 7.00033L7 12.8337"
                          stroke="#344054" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        @else
            <button class="navigation_button d-inline-flex align-items-center gap-2" disabled>
                <span>Next</span>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.16666 7.00033H12.8333M12.8333 7.00033L7 1.16699M12.8333 7.00033L7 12.8337"
                          stroke="#344054" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        @endif
    </div>
@endif

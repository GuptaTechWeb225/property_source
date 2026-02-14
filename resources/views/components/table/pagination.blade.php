@props([
'data' => [],
])
@if($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="table_pagination d-flex align-items-center justify-content-between">
        <div class="table_pagination_left d-flex gap_12 align-items-center">
            @if ($data->onFirstPage())
                <button class="navigation_button" disabled>Previous</button>
            @else
                <a href="{{ $data->previousPageUrl() }}" class="navigation_button">Previous</a>
            @endif

            @if ($data->hasMorePages())
                <a href="{{ $data->nextPageUrl() }}" class="navigation_button">Next</a>
            @else
                <button class="navigation_button" disabled>Next</button>
            @endif
        </div>
        <div class="table_pagination_right">
            Page {{ $data->currentPage() }} of {{ $data->lastPage() }}
        </div>
    </div>
@endif

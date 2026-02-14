<div class="d-flex justify-content-between align-items-center my-4">
    @php
        // Get user_id from the route if available, fallback to authenticated user's ID
        $user_id = @request()->route('user_id');
    @endphp

    @if (isset($previous))
        @if (Auth::user()->role_id == 4)
            <!-- For Role ID 4, using only slide_no -->
            <a href="{{ route('get_my_form_data', $previous) }}" class="btn btn-primary">
                &larr; Previous
            </a>
        @else
            <!-- For other roles, using user_id and slide_no -->
            <a href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => $previous]) }}" class="btn btn-primary">
                &larr; Previous
            </a>
        @endif
    @endif

    @if (isset($next))
        @if (Auth::user()->role_id == 4)
            <!-- For Role ID 4, using only slide_no -->
            <a href="{{ route('get_my_form_data', $next) }}" class="btn btn-primary">
                Next &rarr;
            </a>
        @else
            <!-- For other roles, using user_id and slide_no -->
            <a href="{{ route('property_owner_form_data', ['user_id' => $user_id, 'slide_no' => $next]) }}" class="btn btn-primary">
                Next &rarr;
            </a>
        @endif
    @endif
</div>

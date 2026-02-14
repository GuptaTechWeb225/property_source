<!-- resources/views/components/navigation-links.blade.php -->
<div class="flex justify-between items-center my-4">
    @if ($previous)
        <a href="{{ route('get_my_form_data', $previous->id) }}" class="text-blue-500 hover:underline">
            &larr; {{ $previous->title }}
        </a>
    @else
        <span class="text-gray-400">&larr; No previous</span>
    @endif

    @if ($next)
        <a href="{{ route('get_my_form_data', $next->id) }}" class="text-blue-500 hover:underline">
            {{ $next->title }} &rarr;
        </a>
    @else
        <span class="text-gray-400">No next &rarr;</span>
    @endif
</div>

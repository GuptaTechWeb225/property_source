@foreach($pages as $page)
    <option value="{{ $page->id }}" {{ @$data['page']->parent_id == $page->id ? 'selected': '' }}>{{ str_repeat('|__', $level ?? 0) }} {{ $page->title }}</option>
    @if($page->children->isNotEmpty())
        @include('backend.frontend_pages.page_options', ['pages' => $page->children, 'level' => ($level ?? 0) + 1])
    @endif
@endforeach

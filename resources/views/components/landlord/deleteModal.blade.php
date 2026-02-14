@props([
    'title' => "Cancel The Viewing?",
    'description' => "Are you sure you want to cancel this viewing? This action cannot be undone.",
    'route' => null,
    'id' => null,
])

<button  data-bs-toggle="modal" data-bs-target="#deleteRow{{$id}}" class="border-0 bg-transparent action_item d-flex align-items-center justify-content-center">
    <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.5 5.00033H3.16667M3.16667 5.00033H16.5M3.16667 5.00033V16.667C3.16667 17.109 3.34226 17.5329 3.65482 17.8455C3.96738 18.1581 4.39131 18.3337 4.83333 18.3337H13.1667C13.6087 18.3337 14.0326 18.1581 14.3452 17.8455C14.6577 17.5329 14.8333 17.109 14.8333 16.667V5.00033H3.16667ZM5.66667 5.00033V3.33366C5.66667 2.89163 5.84226 2.46771 6.15482 2.15515C6.46738 1.84259 6.89131 1.66699 7.33333 1.66699H10.6667C11.1087 1.66699 11.5326 1.84259 11.8452 2.15515C12.1577 2.46771 12.3333 2.89163 12.3333 3.33366V5.00033M7.33333 9.16699V14.167M10.6667 9.16699V14.167" stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
</button>



<div class="modal fade  primary_modal" id="deleteRow{{$id}}" tabindex="-1" aria-labelledby="delete_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered border-0 mw_400">
        <div class="modal-content border-0 p-4">
            <div class="modal-header justify-content-center border-0 p-0">
                <div class="icon">
                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="4" y="4" width="48" height="48" rx="24" fill="#FEE4E2" />
                        <rect x="4" y="4" width="48" height="48" rx="24" stroke="#FEF3F2" stroke-width="8" />
                        <path d="M28 24V28M28 32H28.01M38 28C38 33.5228 33.5228 38 28 38C22.4772 38 18 33.5228 18 28C18 22.4772 22.4772 18 28 18C33.5228 18 38 22.4772 38 28Z" stroke="#D92D20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>

            <div class="modal-body text-center p-0">
                <h3 class="modal_title mb-0">Are you sure?</h3>
                <p class="modal_desc">You won't be able to revert this</p>
            </div>

            <div class="modal-footer border-0 p-0 gap_12">
                <button type="button" class="theme_line_btn style2  m-0 flex-fill" data-bs-dismiss="modal">No</button>
                <form action="{{ $route }}" method="post" class="flex-fill">
                    @csrf
                    @method('delete')
                    <button type="{{ isset($route) ? 'submit':'button' }}" class="danger_btn style2  m-0 w-100">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>

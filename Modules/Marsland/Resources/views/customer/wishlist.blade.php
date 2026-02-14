@extends('marsland::layouts.customer')
@section('title', _trans('common.Wishlists'))

@section('customer-content')
    <div class="sidebar-content-wrap flex-fill ot-card white-bg border-0">
        <!-- my wishlist S t a r t -->
        <section class="my-wishlist">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle-two mb-20">
                        <h5 class="title font-600 text-capitalize">{{ _trans('common.My Wishlist') }}</h5>
                    </div>
                </div>
                @forelse ($wishlists as $wishlist)
                    <div class="col-xxl-4 col-xl-5 col-md-6 view-wrapper">
                        <div class="single-product radius-8 h-calc">
                            <div class="product-img position-relative overflow-hidden">
                                <a href="#">
                                    <img src="{{ @globalAsset($wishlist->property?->defaultImage?->path) }}" class="img-fluid" alt="img">
                                </a>
                                <div class="two-badge">
                                    <span class="badges text-uppercase badge-bg-green"> -{{ $wishlist->property?->discount_amount }}% </span>
                                    @if ($wishlist->property?->deal_type == 1)
                                        <span class="badges text-uppercase badge-bg-yellow">{{ _trans('common.Rent') }}</span>
                                    @else
                                        <span class="badges text-uppercase badge-bg-primary"> {{ _trans('common.Sale') }} </span>
                                    @endif
                                </div>

                                <!-- Delete Wishlist -->
                                <div class="wish-list position-absolute top-0 end-0">
                                    <form id="delete-form-{{ $wishlist->id }}" action="{{ route('customer.wishlists.delete', $wishlist->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="button"
                                            data-wishlist-id="{{ $wishlist->id }}"
                                            class="btn-removed-wishlist text-20 border-0 bg-danger text-white width-40 height-40 rounded-bottom-left lh-2"
                                            >
                                            <i class="ri-delete-bin-4-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="product-info d-flex flex-column gap-15">
                                    <div class="row gy-2 border-bottom pb-15">
                                        <div class="col-sm-6">
                                            <div class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                                <div class="icon text-primary"><i class="ri-map-pin-2-line"></i></div>
                                                <span>{{ $wishlist->property?->address }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                                <div class="icon text-primary"><i class="ri-hotel-bed-line"></i></div>
                                                <span>{{ $wishlist->property?->bedroom }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                                <div class="icon text-primary"><i class="ri-walk-fill"></i></div>
                                                <span>{{ $wishlist->property?->bathroom }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="text-paragraph text-14 font-600 d-flex gap-8 align-items-center">
                                                <div class="icon text-primary"><i class="ri-building-4-line"></i></div>
                                                <span>{{ $wishlist->property?->size }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ route('property.detail', $wishlist->property?->slug) }}">
                                        <h4 class="line-clamp-1 text-20 font-600">{{ $wishlist->property?->name }}</h4>
                                    </a>

                                    <div class="d-flex justify-content-between flex-wrap gap-2">
                                        <span class="product_banding text-title">{{ $wishlist->property?->category?->name }}</span>
                                        <h5 class="font-500 text-16 text-primary">৳ 55,90,998</h5>
                                    </div>

                                    {{-- Contact section --}}
                                    <div class="d-flex gap-10 flex-wrap">
                                        <!-- Phone Call Link -->
                                        <a href="tel:{{ $wishlist->property?->user?->phone }}" class="btn-primary-fill flex-fill text-uppercase">{{ _trans('common.Call') }}</a>
                                        <!-- Email Link -->
                                        <a href="mailto:{{ $wishlist->property?->user?->email }}" class="btn-primary-outline flex-fill text-uppercase">{{ _trans('common.Email') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="d-flex justify-content-center p-3">
                        <p>{{ _trans("common.No data found") }}</p>
                    </div>
                @endforelse

                {!! $wishlists->links() !!}
            </div>
        </section>
        <!-- End-of my wishlist -->
    </div>
@endsection

@push('script')
    <script>
        $(".btn-removed-wishlist").click(function() {
            var wishlistId = $(this).data("wishlist-id");
            deleteFromWishlist(wishlistId);
        });

        // Delete from wishlist
        function deleteFromWishlist(wishlistId) {
            Swal.fire({
                title: `{{ _trans('alert.Are you sure?') }}`,
                text: `{{ _trans('alert.Are sure to delete this item.') }}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: `{{ _trans('alert.Yes, delete it!') }}`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete-form-${wishlistId}`).submit()
                }
            });
        }
    </script>
@endpush


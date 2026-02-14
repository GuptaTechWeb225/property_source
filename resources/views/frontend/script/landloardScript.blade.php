<script>
    function submitForm() {
        document.getElementById("logout").submit();
    }

    function showForRegister(type, status) {
        if (status == 'logged') {
            if (type == 'call') {
                $('#callModal').modal('show')
                $('.modal-backdrop').show();
            } else {
                $('#emailModal').modal('show');
                $('.modal-backdrop').show();
            }
        } else {
            location.href = "{{ route('login') }}";
        }
    }

    let count = $("#cart-view").text();
    if(count==""){
        $('#cart-view').html(0);
    }
    let wishCount = $(".wish-view").text();
    if(wishCount==""){
        $('.wish-view').html(0);
    }




    // loading_related_properties
    function getRelatedProperties(){
        $('#loading_related_properties').empty();
        $.ajax({
            url: "{{ route('getRelatedProperties') }}",
            type: "GET",
            dataType: "json",
            success: function (data) {
                var html = '';
                $.each(data.properties, function (key, property) {
                    html += `
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product_widget5 mb_30">
                            <div class="product_thumb_upper">
                                <a href="${property.details_url}" class="thumb">
                                    <img src="${property.image}" alt="">
                                </a>
                                <div class="product_action">
                                    <a href="compare.php">
                                        <i class="ti-control-shuffle"></i>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#theme_modal">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-star"></i>
                                    </a>
                                </div>
                                <span class="badge_1"> -20% </span>
                                <span class="badge_1 style2 text-uppercase"> ${property.deal_type} </span>
                            </div>
                            <div class="product__meta text-start">
                                <div class="d-flex justify-content-between flex-wrap gap-2">
                                    <span class="product_banding secondary_text">${property.category}</span>
                                    <h5 class="f_w_600 font_16">${property.price}</h5>
                                </div>
                                <a href="${property.details_url}">
                                    <h4>${property.name}</h4>
                                </a>
                                <div class="d-flex flex-wrap gap-3  mt_10">
                                    <span class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                            class="fas fa-bed fw-bolder body_text"></i>${property.bedrooms} Bed</span>
                                    <span class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                            class="far fa-bath fw-bolder body_text"></i>${property.bathrooms} bath</span>
                                    <span class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                            class="far fa-border-all fw-bolder body_text"></i>${property.size} sqft</span>
                                </div>
                                <div class="d-flex gap-2 mt-3">
                                            <a href="javascript:void(0)" onclick="showForRegister('call',@if(Auth::check()) 'logged' @else 'notlogged' @endif  )"
                                                class="o_land_primary_btn small_btn radius_5px flex-fill">Call</a>
                                            <a href="javascript:void(0)" onclick="showForRegister('email',@if(Auth::check()) 'logged' @else 'notlogged' @endif  )"
                                                class="o_land_primary_btn2 small_btn radius_5px flex-fill">Email</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                });
                $('#loading_related_properties').html(html);

            },
            error: function (data) {
                console.log(data);
            }
        });
    }


   // loading_trending_properties
   function getTrendingProperties(){
        $('#loading_trending_properties').empty();
        $.ajax({
            url: "{{ route('getTrendingProperties') }}",
            type: "GET",
            dataType: "json",
            success: function (data) {
                var html = '';
                $.each(data.property, function (key, property) {
            html += `
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="product_widget5 mb_30">
                    <div class="product_thumb_upper">
                        <a href="${property.details_url}" class="thumb">
                            <img src="${property.image}" alt="">
                        </a>
                        <div class="product_action">
                            <a href="compare.php">
                                <i class="ti-control-shuffle"></i>
                            </a>
                            <a data-bs-toggle="modal" data-bs-target="#theme_modal">
                                <i class="ti-eye"></i>
                            </a>
                            <a href="#">
                                <i class="ti-star"></i>
                            </a>
                        </div>
                        <span class="badge_1"> -20% </span>
                        <span class="badge_1 style2 text-uppercase"> ${property.deal_type} </span>
                    </div>
                    <div class="product__meta text-start">
                        <div class="d-flex justify-content-between flex-wrap gap-2">
                            <span class="product_banding secondary_text">${property.category}</span>
                            <h5 class="f_w_600 font_16">${property.price}</h5>
                        </div>
                        <a href="${property.details_url}">
                            <h4>${property.name}</h4>
                        </a>
                        <div class="d-flex flex-wrap gap-3  mt_10">
                            <span class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                    class="fas fa-bed fw-bolder body_text"></i>${property.bedrooms} Bed</span>
                            <span class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                    class="far fa-bath fw-bolder body_text"></i>${property.bathrooms} bath</span>
                            <span class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                    class="far fa-border-all fw-bolder body_text"></i>${property.size} sqft</span>
                        </div>
                    </div>
                </div>
            </div>`;
        });
                $('#loading_trending_properties').html(html);

            },
            error: function (data) {
                console.log(data);
            }
        });
    }
// end
    // Buy Property
   function getBuyProperties(){
        $('#loading_buying_properties').empty();
        $.ajax({
            url: "{{ route('getBuyProperties') }}",
            type: "GET",
            dataType: "json",
            success: function (data) {
                var html = '';
                $.each(data.property, function (key, property) {
                    html += `
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product_widget5 mb_30">
                            <div class="product_thumb_upper">
                                <a href="${property.details_url}" class="thumb">
                                    <img src="${property.image}" alt="">
                                </a>
                                <div class="product_action">
                                    <a href="compare.php">
                                        <i class="ti-control-shuffle"></i>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#theme_modal">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-star"></i>
                                    </a>
                                </div>
                                <span class="badge_1"> -20% </span>
                                <span class="badge_1 style2 text-uppercase"> ${property.deal_type} </span>
                            </div>
                            <div class="product__meta text-start">
                                <div class="d-flex justify-content-between flex-wrap gap-2">
                                    <span class="product_banding secondary_text">${property.category}</span>
                                    <h5 class="f_w_600 font_16">${property.price}</h5>
                                </div>
                                <a href="${property.details_url}">
                                    <h4>${property.name}</h4>
                                </a>
                                <div class="d-flex flex-wrap gap-3  mt_10">
                                    <span class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                            class="fas fa-bed fw-bolder body_text"></i>${property.bedrooms} Bed</span>
                                    <span class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                            class="far fa-bath fw-bolder body_text"></i>${property.bathrooms} bath</span>
                                    <span class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                            class="far fa-border-all fw-bolder body_text"></i>${property.size} sqft</span>
                                </div>
                                <div class="d-flex gap-2 mt-3">
                                            <a href="javascript:void(0)" onclick="showForRegister('call',@if(Auth::check()) 'logged' @else 'notlogged' @endif  )"
                                                class="o_land_primary_btn small_btn radius_5px flex-fill">Call</a>
                                            <a href="javascript:void(0)" onclick="showForRegister('email',@if(Auth::check()) 'logged' @else 'notlogged' @endif  )"
                                                class="o_land_primary_btn2 small_btn radius_5px flex-fill">Email</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                });
                $('#loading_buying_properties').html(html);

            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    function loadingHotCategories(){

        $.ajax({
            url: "{{ route('getHotCategories') }}",
            type: "GET",
            dataType: "json",
            success: function (data) {
                var html = '';
                $.each(data.data, function (key, property) {
                    html += `
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product_widget5 mb_30">
                            <div class="product_thumb_upper">
                                <a href="${property.details_url}" class="thumb">
                                    <img src="${property.image}" alt="">
                                </a>
                                <div class="product_action">
                                    <a href="compare.php">
                                        <i class="ti-control-shuffle"></i>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#theme_modal">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-star"></i>
                                    </a>
                                </div>
                                <span class="badge_1"> -20% </span>
                                <span class="badge_1 style2 text-uppercase"> ${property.deal_type} </span>
                            </div>
                            <div class="product__meta text-start">
                                <div class="d-flex justify-content-between flex-wrap gap-2">
                                    <span class="product_banding secondary_text">${property.category}</span>
                                    <h5 class="f_w_600 font_16">${property.price}</h5>
                                </div>
                                <a href="${property.details_url}">
                                    <h4>${property.name}</h4>
                                </a>
                                <div class="d-flex flex-wrap gap-3  mt_10">
                                    <span class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                            class="fas fa-bed fw-bolder body_text"></i>${property.bedrooms} Bed</span>
                                    <span class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                            class="far fa-bath fw-bolder body_text"></i>${property.bathrooms} bath</span>
                                    <span class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                            class="far fa-border-all fw-bolder body_text"></i>${property.size} sqft</span>
                                </div>
                                <div class="d-flex gap-2 mt-3">
                                            <a href="javascript:void(0)" onclick="showForRegister('call',@if(Auth::check()) 'logged' @else 'notlogged' @endif  )"
                                                class="o_land_primary_btn small_btn radius_5px flex-fill">Call</a>
                                            <a href="javascript:void(0)" onclick="showForRegister('email',@if(Auth::check()) 'logged' @else 'notlogged' @endif  )"
                                                class="o_land_primary_btn2 small_btn radius_5px flex-fill">Email</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                });
                $('#loading_buying_properties').html(html);

            },
            error: function (data) {
                console.log(data);
            }
        });
    }


    // Cart Delete Start
    $(document).on('click', '.cart-delete', function(e){
        e.preventDefault();
        var cartId = $(this).data('id');
        var url = "{{ route('customer.removeCart', ':id')}}".replace(':id', cartId);

        $.ajax({
            type: "DELETE",
            data: {
                    "_token": "{{ csrf_token() }}",
                    "id": cartId
                   },
            url: url,
            success: function (data) {
                if (data.success) {
                    location.reload();
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    })

    // Cart Delete End


    // Cart Delete Start
    $(document).on('click', '.wishlist-delete', function(e){
        e.preventDefault();
        var wishlistId = $(this).data('id');
        var url = "{{ route('customer.removeWishlist', ':id')}}".replace(':id', wishlistId);

        $.ajax({
            type: "DELETE",
            data: {
                    "_token": "{{ csrf_token() }}",
                    "id": wishlistId
                   },
            url: url,
            success: function (data) {
                if (data.success) {
                    location.reload();
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    })

    // Cart Delete End


    function activeSlider(){
        if (".bannerUi_Recommendation_active".length > 0) {
    $(".bannerUi_Recommendation_active").owlCarousel({
      loop: true,
      margin: 24,
      items: 1,
      autoplay: true,
      navText: [
        '<i class="ti-angle-left"></i>',
        '<i class="ti-angle-right"></i>',
      ],
      nav: true,
      dots: false,
      autoplayHoverPause: true,
      autoplaySpeed: 800,
      responsive: {
        0: {
          items: 1,
          nav: false,
        },
        768: {
          items: 2,
        },
        992: {
          items: 3,
        },
        1200: {
          items: 4,
        },
        1640: {
          items: 4,
        },
      },
    });
  }
    }


    //end

        // Rent Property
   function getRentProperties(){
        $('#loading_rent_properties').empty();
        $.ajax({
            url: "{{ route('getRentProperties') }}",
            type: "GET",
            dataType: "json",
            success: function (data) {
                var html = '';
                $.each(data.property, function (key, property) {
                    html += `
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product_widget5 mb_30">
                            <div class="product_thumb_upper">
                                <a href="${property.details_url}" class="thumb">
                                    <img src="${property.image}" alt="">
                                </a>
                                <div class="product_action">
                                    <a href="compare.php">
                                        <i class="ti-control-shuffle"></i>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#theme_modal">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-star"></i>
                                    </a>
                                </div>
                                <span class="badge_1"> -20% </span>
                                <span class="badge_1 style2 text-uppercase"> ${property.deal_type} </span>
                            </div>
                            <div class="product__meta text-start">
                                <div class="d-flex justify-content-between flex-wrap gap-2">
                                    <span class="product_banding secondary_text">${property.category}</span>
                                    <h5 class="f_w_600 font_16">${property.price}</h5>
                                </div>
                                <a href="${property.details_url}">
                                    <h4>${property.name}</h4>
                                </a>
                                <div class="d-flex flex-wrap gap-3  mt_10">
                                    <span class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                            class="fas fa-bed fw-bolder body_text"></i>${property.bedrooms} Bed</span>
                                    <span class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                            class="far fa-bath fw-bolder body_text"></i>${property.bathrooms} bath</span>
                                    <span class="body_text d-flex gap_6 align-items-center justify-content-center font_14"><i
                                            class="far fa-border-all fw-bolder body_text"></i>${property.size} sqft</span>
                                </div>
                                <div class="d-flex gap-2 mt-3">
                                            <a href="javascript:void(0)" onclick="showForRegister('call',@if(Auth::check()) 'logged' @else 'notlogged' @endif  )"
                                                class="o_land_primary_btn small_btn radius_5px flex-fill">Call</a>
                                            <a href="javascript:void(0)" onclick="showForRegister('email',@if(Auth::check()) 'logged' @else 'notlogged' @endif  )"
                                                class="o_land_primary_btn2 small_btn radius_5px flex-fill">Email</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                });
                $('#loading_rent_properties').html(html);

            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    function loadingHotCategories(){

        $.ajax({
            url: "{{ route('getHotCategories') }}",
            type: "GET",
            dataType: "json",
            success: function (data) {
                var html = '';
                $.each(data.categories, function (key, category) {
                    html += `
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="o_land_home_cartBox o_land_cat_bg${key+1} d-flex justify-content-end mb_30">
                                <div class="o_land_text_box">
                                    <h4>
                                        <a href="#">${category.name}</a>
                                    </h4>
                                    <p class="lh-1">${category.count} Products</p>
                                    <a class="shop_now_text" href="{{ route('properties') }}">See now »</a>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#__loadingHotCategories').html(html);

            },
            error: function (data) {
                console.log(data);
            }
        });
    }


    // Cart Delete Start
    $(document).on('click', '.cart-delete', function(e){
        e.preventDefault();
        var cartId = $(this).data('id');
        var url = "{{ route('customer.removeCart', ':id')}}".replace(':id', cartId);

        $.ajax({
            type: "DELETE",
            data: {
                    "_token": "{{ csrf_token() }}",
                    "id": cartId
                   },
            url: url,
            success: function (data) {
                if (data.success) {
                    location.reload();
                }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    })

    // Cart Delete End





    function activeSlider(){
        if (".bannerUi_Recommendation_active".length > 0) {
    $(".bannerUi_Recommendation_active").owlCarousel({
      loop: true,
      margin: 24,
      items: 1,
      autoplay: true,
      navText: [
        '<i class="ti-angle-left"></i>',
        '<i class="ti-angle-right"></i>',
      ],
      nav: true,
      dots: false,
      autoplayHoverPause: true,
      autoplaySpeed: 800,
      responsive: {
        0: {
          items: 1,
          nav: false,
        },
        768: {
          items: 2,
        },
        992: {
          items: 3,
        },
        1200: {
          items: 4,
        },
        1640: {
          items: 4,
        },
      },
    });
  }
    }


    //end
    if ($('#loading_related_properties').length > 0) {
        getRelatedProperties();
    }

    // __recommendation_for_you
    // if ($('#__recommendation_for_you').length > 0) {
    //     getRecommendationForYou();
    // }

    // __trending_properties
    if ($('#loading_trending_properties').length > 0) {
        getTrendingProperties();
    }

    // __buying_properties
    if ($('#loading_buying_properties').length > 0) {
        getBuyProperties();
    }

    // __rent_properties
    if ($('#loading_rent_properties').length > 0) {
        getRentProperties();
    }

    // __loadingHotCategories
    if ($('#__loadingHotCategories').length > 0) {
        loadingHotCategories();
    }

</script>

<script>
    function showImagePopup(src) {
  var popup = document.createElement("div");
  popup.classList.add("popup");
  var image = document.createElement("img");
  image.classList.add("popup-image");
  image.src = src;
  popup.appendChild(image);
  document.body.appendChild(popup);
  document.body.style.overflow = "hidden";
  var zoomLevel = 1;
  var mouseDown = false;
  var startX, startY;
  var currentX, currentY;
  popup.onmousedown = function(event) {
  event.preventDefault();
  mouseDown = true;
  startX = event.clientX;
  startY = event.clientY;
  }
  popup.onmouseup = function(event) {
  event.preventDefault();
  mouseDown = false;
  }
  popup.onmousemove = function(event) {
  event.preventDefault();
  if (mouseDown) {
  currentX = event.clientX;
  currentY = event.clientY;
  var deltaX = currentX - startX;
  var deltaY = currentY - startY;
  image.style.transform = "scale(" + zoomLevel + ") translate(" + deltaX + "px, " + deltaY + "px)";
  }
  }
  popup.onclick = function() {
  document.body.removeChild(popup);
  document.body.style.overflow = "auto";
  }
  image.ondblclick = function() {
  if (zoomLevel == 1) {
  zoomLevel = 2;
  image.style.transform = "scale(2)";
  } else {
  zoomLevel = 1;
  image.style.transform = "scale(1)";
  }
  };

  image.addEventListener('click', function(event) {
    event.stopPropagation();
    if (zoomLevel == 1) {
      zoomLevel = 2;
      image.style.transform = "scale(2)";
    } else {
      zoomLevel = 1;
      image.style.transform = "scale(1)";
    }
  });

  image.addEventListener('wheel', function(event) {
    event.preventDefault();
    var delta = event.deltaY;
    if (delta < 0) {
      zoomLevel += 0.1;
    } else {
      zoomLevel -= 0.1;
    }
    if (zoomLevel < 1) {
      zoomLevel = 1;
    }
    image.style.transform = "scale(" + zoomLevel + ")";
  });

}
</script>

(function ($) {
  "use strict";

  $(window).on("load", function () {
    setTimeout(function () {
      $(".preloader").fadeOut(500);
    }, 2000);
  });

  $(window).on("load", function () {
    setTimeout(function () {
      $(".newsletter_form_wrapper").addClass("newsletter_active").fadeIn();
    }, 1500);
  });

  //* Navbar Fixed
  var nav_offset_top = $("header").height() + 50;
  /*-------------------------------------------------------------------------------
	  Navbar
	-------------------------------------------------------------------------------*/
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();
    if (scroll < 400) {
      $("#sticky-header").removeClass("navbar_fixed");
      $("#back-top").fadeOut(500);
    } else {
      $("#sticky-header").addClass("navbar_fixed");
      $("#back-top").fadeIn(500);
    }
  });
  // search home6

  // MENU ACTIVE
  // jQuery(function($) {
  //   var path = window.location.href;
  //   $('.main_menu a').each(function() {
  //    if (this.href === path) {
  //     $(this).parents(".submenu").closest('li').addClass('submenu_active');
  //     $(this).addClass('active');
  //    }
  //   });
  //  });

  // back to top
  $("#back-top a").on("click", function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      1000
    );
    return false;
  });

  // #######################
  //   MOBILE MENU
  // #######################

  var menu = $("ul#mobile-menu");
  if (menu.length) {
    menu.slicknav({
      prependTo: ".mobile_menu",
      closedSymbol: '<i class="ti-angle-down"></i>',
      openedSymbol: '<i class="ti-angle-up"></i>',
    });
  }
  $(document).ready(function () {
    if ($("#scrolling_nav").length > 0) {
      $("#scrolling_nav").onePageNav();
    }
  });
  // .scrollbar activation
  if ($(".category_menu_scroll").length > 0) {
    const ps = new PerfectScrollbar(".category_menu_scroll", {
      wheelSpeed: 0.2,
      wheelPropagation: true,
      minScrollbarLength: 20,
      suppressScrollX : false,
      suppressScrollX  : false,
      scrollingThreshold   : 2000,
    });
  }

  //active sidebar
  $(".sidebar_icon").on("click", function () {
    $(".sidebar").toggleClass("active_sidebar");
  });

  $(".sidebar_close_icon i").on("click", function () {
    $(".sidebar").removeClass("active_sidebar");
  });

  //remove sidebar
  $(document).click(function (event) {
    if (!$(event.target).closest(".sidebar_icon, .sidebar").length) {
      $("body").find(".sidebar").removeClass("active_sidebar");
    }
  });

  // home 5 search
  $(".search_btn").on("click", function () {
    $(this).parent().toggleClass("active");
    $("i", this).toggleClass("ti-search ti-close");
  });

  $(document).click(function (event) {
    if (!$(event.target).closest(".search_btn, .search_field").length) {
      $("body").find(".search_field").removeClass("active");
      $("body").find(".search_btn i").toggleClass("ti-close ti-search ");
    }
  });

  //notification
  $(".notification_open > a").on("click", function () {
    $(".notification_area").toggleClass("active");
  });
  //remove sidebar
  $(document).click(function (event) {
    if (
      !$(event.target).closest(".notification_area,.notification_open > a")
        .length
    ) {
      $("body").find(".notification_area").removeClass("active");
    }
  });
  //active courses option
  $(".courses_option, .collaps_icon").on("click", function () {
    $(this).parent(".custom_select, .collaps_part").toggleClass("active");
  });
  $(document).click(function (event) {
    if (!$(event.target).closest(".custom_select").length) {
      $("body").find(".custom_select").removeClass("active");
    }
    if (!$(event.target).closest(".collaps_part").length) {
      $("body").find(".collaps_part").removeClass("active");
    }
  });

  // elemts sidebar
  $(".elemnts_sidebar_toogler").on("click", function () {
    $(".elemts_sidebar").toggleClass("active");
  });

  //remove sidebar
  $(document).click(function (event) {
    if (
      !$(event.target).closest(".elemnts_sidebar_toogler, .elemts_sidebar")
        .length
    ) {
      $("body").find(".elemts_sidebar").removeClass("active");
    }
  });

  // wow js
  new WOW().init();
  // for MENU POPUP
  $(".add_to_cart").on("click", function () {
    $(".shoping_cart ,.dark_overlay").toggleClass("active");
  });
  $(".chart_close").on("click", function () {
    $(".shoping_cart ,.dark_overlay").removeClass("active");
  });
  // $(document).click(function (event) {
  //   if (!$(event.target).closest(".add_to_cart,.shoping_cart").length) {
  //     $("body").find(".dark_overlay").removeClass("active");
  //   }
  // });
  // $(document).click(function (event) {
  //   if (!$(event.target).closest(".add_to_cart ,.shoping_cart").length) {
  //     $("body").find(".shoping_cart").removeClass("active");
  //   }
  // });

  // sidebar menu open
  $(".sidebar_menu_toggle").on("click", function () {
    $(".sidebar_menu_wrapper").toggleClass("sidebar_open");
  });

  $(document).click(function (event) {
    if (
      !$(event.target).closest(".sidebar_menu_toggle ,.sidebar_menu_wrapper")
        .length
    ) {
      $("body").find(".sidebar_menu_wrapper").removeClass("sidebar_open");
    }
  });
  // catgory toggle
  $(".category_toggler").on("click", function () {
    $("#product_category_chose").toggleClass("active");
  });
  $("#catgory_sidebar_closeIcon").on("click", function () {
    $("#product_category_chose").removeClass("active");
  });
  $(document).click(function (event) {
    if (
      !$(event.target).closest(".category_toggler ,#product_category_chose")
        .length
    ) {
      $("body").find("#product_category_chose").removeClass("active");
    }
  });
  // hideporobar
  $(".close_promobar").on("click", function () {
    $(this).closest(".promotion_bar").remove();
  });
  // language
  $(".language_toggle_btn").on("click", function () {
    $(".language_toggle_box").toggleClass("active");
  });

  $(document).click(function (event) {
    if (
      !$(event.target).closest(".language_toggle_btn ,.language_toggle_box")
        .length
    ) {
      $("body").find(".language_toggle_box").removeClass("active");
    }
  });
  // summernote
  $(document).ready(function () {
    if ($("#summernote").length > 0) {
      $("#summernote").summernote({
        placeholder: "Hello stand alone ui",
        tabsize: 2,
        height: 150,
        toolbar: [
          ["style", ["style"]],
          ["font", ["bold", "underline", "clear"]],
          ["color", ["color"]],
          ["para", ["ul", "ol", "paragraph"]],
          ["table", ["table"]],
          ["insert", ["link", "picture", "video"]],
          ["view", ["fullscreen", "codeview", "help"]],
        ],
      });
    }
  });
  // select
  if ($(".small_select").length > 0) {
    $(".small_select").niceSelect();
  }
  if ($(".theme_select").length > 0) {
    $(".theme_select").niceSelect();
  }
  if ($(".o_land_select").length > 0) {
    $(".o_land_select").niceSelect();
  }
  if ($(".o_land_select2").length > 0) {
    $(".o_land_select2").niceSelect();
  }
  if ($(".o_land_select3").length > 0) {
    $(".o_land_select3").niceSelect();
  }
  if ($(".o_land_select4").length > 0) {
    $(".o_land_select4").niceSelect();
  }
  if ($(".o_land_select5").length > 0) {
    $(".o_land_select5").niceSelect();
  }
  if ($(".o_land_select6").length > 0) {
    $(".o_land_select6").niceSelect();
  }
  if ($(".home10_select2").length > 0) {
    $(".home10_select2").niceSelect();
  }

  $(".product_size li").on("click", function (event) {
    $(this).siblings(".active").removeClass("active");
    $(this).addClass("active");
    event.preventDefault();
  });
  // BARFILLER
  $(document).ready(function () {
    var proBar = $("#bar1");
    if (proBar.length) {
      proBar.barfiller({ barColor: "#fb6600", duration: 2000 });
    }
    var proBar = $("#bar2");
    if (proBar.length) {
      proBar.barfiller({ barColor: "#fb6600", duration: 2100 });
    }
    var proBar = $("#bar3");
    if (proBar.length) {
      proBar.barfiller({ barColor: "#fb6600", duration: 2200 });
    }
  });

  // #######################
  //  carousel_active
  // #######################
  if (".carousel_active".length > 0) {
    $(".carousel_active").owlCarousel({
      loop: true,
      margin: 30,
      items: 1,
      autoplay: true,
      navText: [
        '<i class="fa fa-angle-left"></i>',
        '<i class="fa fa-angle-right"></i>',
      ],
      nav: false,
      dots: false,
      autoplayHoverPause: true,
      autoplaySpeed: 800,
      responsive: {
        0: {
          items: 2,
        },
        767: {
          items: 4,
        },
        992: {
          items: 5,
        },
        1400: {
          items: 6,
        },
      },
    });
  }

  if (".product_slide".length > 0) {
    $(".product_slide").owlCarousel({
      loop: false,
      margin: -1,
      items: 1,
      autoplay: true,
      navText: [
        '<i class="fa fa-angle-left"></i>',
        '<i class="fa fa-angle-right"></i>',
      ],
      nav: true,
      dots: false,
      autoplayHoverPause: true,
      autoplaySpeed: 800,
      responsive: {
        0: {
          items: 1,
        },
        767: {
          items: 2,
        },
        992: {
          items: 3,
        },
        1400: {
          items: 4,
        },
      },
    });
  }
  if (".product_slide2".length > 0) {
    $(".product_slide2").owlCarousel({
      loop: true,
      margin: -1,
      items: 1,
      autoplay: true,
      navText: [
        '<i class="fa fa-angle-left"></i>',
        '<i class="fa fa-angle-right"></i>',
      ],
      nav: false,
      dots: false,
      autoplayHoverPause: true,
      autoplaySpeed: 800,
      responsive: {
        0: {
          items: 1,
          nav: false,
        },
        767: {
          items: 2,
        },
        992: {
          items: 3,
        },
        1400: {
          items: 4,
        },
      },
    });
  }
  if (".brand_active".length > 0) {
    $(".brand_active").owlCarousel({
      loop: true,
      margin: -1,
      items: 1,
      autoplay: true,
      navText: [
        '<i class="fa fa-angle-left"></i>',
        '<i class="fa fa-angle-right"></i>',
      ],
      nav: false,
      dots: false,
      autoplayHoverPause: true,
      autoplaySpeed: 800,
      responsive: {
        0: {
          items: 1,
        },
        767: {
          items: 3,
        },
        992: {
          items: 4,
        },
        1400: {
          items: 5,
        },
      },
    });
  }

  /* -------------------------------------------------------------------------- */
  /*                              HOME2 ACTIVATIONS                             */
  /* -------------------------------------------------------------------------- */

  /* -------------------------------------------------------------------------- */
  /*                          swiper slider activation                          */
  /* -------------------------------------------------------------------------- */
  $(document).ready(function () {
    if (".banner_12_banner_active".length > 0) {
      var swiper = new Swiper(".banner_12_banner_active", {
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
          renderBullet: function (index, className) {
            return (
              '<span class="' + className + '">' + "0" + (index + 1) + "</span>"
            );
          },
        },
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    }
  });

  /* -------------------------------------------------------------------------- */
  /*                               o_landcartUi                              */
  /* -------------------------------------------------------------------------- */
  if (".bannerUi_active".length > 0) {
    $(".bannerUi_active").owlCarousel({
      loop: true,
      margin: 0,
      items: 1,
      autoplay: true,
      navText: [
        '<i class="ti-angle-left"></i>',
        '<i class="ti-angle-right"></i>',
      ],
      nav: false,
      dots: true,
      autoplayHoverPause: true,
      autoplaySpeed: 800,
      responsive: {
        0: {
          items: 1,
          nav: false,
        },
        1640: {
          items: 1,
        },
      },
    });
  }
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
  if (".o_land_fieature_active".length > 0) {
    $(".o_land_fieature_active").owlCarousel({
      loop: true,
      margin: -1,
      items: 1,
      autoplay: true,
      stagePadding: 1,
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
          items: 5,
        },
      },
    });
  }
  if (".compare_product_active".length > 0) {
    $(".compare_product_active").owlCarousel({
      loop: true,
      margin: -1,
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
        767: {
          items: 2,
          nav: false,
        },
        992: {
          items: 3,
        },
        1400: {
          items: 3,
        },
      },
    });
  }
  // counter
  $(".counter").counterUp({
    delay: 10,
    time: 10000,
  });

  /* magnificPopup img view */
  $(".popup-image").magnificPopup({
    type: "image",
    gallery: {
      enabled: true,
    },
  });

  Fancybox.bind('[data-fancybox="gallery"]', {
    infinite: false,
    Image: {
      zoom: true,
    },
  });
  Fancybox.bind('[data-fancybox="floorMap"]', {
    infinite: false,
    Image: {
      zoom: true,
    },
  });

  /* magnificPopup video view */
  $(".popup-video").magnificPopup({
    type: "iframe",
    mainClass: "mfp-fade",
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
  });

  $("#container").imagesLoaded(function () {
    // for filter
    // init Isotope
    var $grid = $(".grid_active").isotope({
      itemSelector: ".grid-item",
      percentPosition: true,
      masonry: {
        // use outer width of grid-sizer for columnWidth
        columnWidth: 1,
        gutter: 0,
      },
    });

    // filter items on button click
    $(".portfolio-menu").on("click", "button", function () {
      var filterValue = $(this).attr("data-filter");
      $grid.isotope({ filter: filterValue });
    });

    //for menu active class
    $(".portfolio-menu button").on("click", function (event) {
      $(this).siblings(".active").removeClass("active");
      $(this).addClass("active");
      event.preventDefault();
    });
    //for wallet_payent_box active class
    $(".wallet_payent_box button").on("click", function (event) {
      $(this).siblings(".active").removeClass("active");
      $(this).addClass("active");
      event.preventDefault();
    });
  });
  /*===============================================
        Parallax business_image
  ================================================*/
  if ($(".man_img").length > 0) {
    $(".man_img").parallax({
      scalarX: 7.0,
      scalarY: 7.0,
    });
  }

  if ($("#mc_embed_signup").length > 0) {
    $("#mc_embed_signup").find("form").ajaxChimp();
  }
  if ($("#mc_embed_signup2").length > 0) {
    $("#mc_embed_signup2").find("form").ajaxChimp();
  }

  $(".btnNext").click(function () {
    $(".nav-pills .active").parent().next("li").find("a").trigger("click");
  });

  $(".btnPrevious").click(function () {
    $(".nav-pills .active").parent().prev("li").find("a").trigger("click");
  });

  // shoping cart parent hide
  $(".close_icon").on("click", function () {
    $(this).closest("tr").hide(500);
  });

  // inc dec number

  (function ($) {
    var cartButtons = $(".product_number_count").find("span");

    $(cartButtons).on("click", function (e) {
      e.preventDefault();
      var $this = $(this);
      var target = $this.parent().data("target");
      var target = $("#" + target);
      var current = parseFloat($(target).val());

      if ($this.hasClass("number_increment")) target.val(current + 1);
      else {
        current < 1 ? null : target.val(current - 1);
      }
    });
  })(jQuery);

  if ($("#count_down").length > 0) {
    $("#count_down").countdown("2021/3/10", function (event) {
      $(this).html(
        event.strftime(
          '<div class="single_count"><span>%D</span></div><span class="count_separator">:</span><div class="single_count"><span>%H</span></div><span class="count_separator">:</span><div class="single_count"><span>%M</span></div><span class="count_separator">:</span><div class="single_count"><span>%S</span></div>'
        )
      );
    });
  }
  if ($("#count_down2").length > 0) {
    $("#count_down2").countdown("2021/3/10", function (event) {
      $(this).html(
        event.strftime(
          '<div class="single_count"><span>%D</span><p>Days</p></div><div class="single_count"><span>%H</span><p>Hours</p></div><div class="single_count"><span>%M</span><p>Minute</p></div><div class="single_count"><span>%S</span><p>Second</p></div>'
        )
      );
    });
  }
  if ($("#count_small").length > 0) {
    $("#count_small").countdown("2021/3/10", function (event) {
      $(this).html(
        event.strftime(
          '<div class="single_count"><span>%D</span><p>Days</p></div><div class="single_count"><span>%H</span><p>Hrs</p></div><div class="single_count"><span>%M</span><p>Mins</p></div><div class="single_count"><span>%S</span><p>Secs</p></div>'
        )
      );
    });
  }
  if ($("#week_countdown").length > 0) {
    $("#week_countdown").countdown("2022/3/10", function (event) {
      $(this).html(
        event.strftime(
          '<div class="single_count"><span>%w</span><p>Weeks</p></div><div class="single_count"><span>%D</span><p>Days</p></div><div class="single_count"><span>%H</span><p>Hrs</p></div><div class="single_count"><span>%M</span><p>Mins</p></div><div class="single_count"><span>%S</span><p>Secs</p></div>'
        )
      );
    });
  }
  if ($("#week_countdown2").length > 0) {
    $("#week_countdown2").countdown("2022/10/10", function (event) {
      $(this).html(
        event.strftime(
          '<div class="single_count"><span>%w</span><p>Weeks</p></div><div class="single_count"><span>%D</span><p>Days</p></div><div class="single_count"><span>%H</span><p>Hrs</p></div><div class="single_count"><span>%M</span><p>Mins</p></div><div class="single_count"><span>%S</span><p>Secs</p></div>'
        )
      );
    });
  }
  $(function () {
    $("#slider-range").slider({
      range: true,
      min: 0,
      max: 500,
      values: [75, 300],
      slide: function (event, ui) {
        $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
      },
    });
    $("#amount").val(
      "$" +
        $("#slider-range").slider("values", 0) +
        " - $" +
        $("#slider-range").slider("values", 1)
    );
  });

  $(document).ready(function () {
    $("#start_datepicker").datepicker();
    $("#end_datepicker").datepicker();
    $("#start_datepicker2").datepicker();
    $("#end_datepicker2").datepicker();
  });

  $(".add_collaspe_btn").on("click", function () {
    $(this).hide();
    $(this)
      .closest(".single_apply_wrapper")
      .find(".collaspe_form")
      .slideDown(200);
  });
  $(".hide_collape_form").on("click", function () {
    $(this)
      .closest(".single_apply_wrapper")
      .find(".collaspe_form")
      .slideUp(500);
    $(this).closest(".single_apply_wrapper").find(".add_collaspe_btn").show();
  });

  // PRODUCT DETAILS CROUSEL
  $(function () {
    // Card's slider
    var $carousel = $(".slider-for");

    $carousel.slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: ".slider-nav",
      centerMode: true,
      pauseOnHover: true,
      useTransform: false,
      autoplay: false,
      infinite: true,
    });

    $(".slider-nav").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: ".slider-for",
      dots: false,
      centerPadding: "0px",
      centerMode: true,
      useTransform: false,
      autoplay: false,
      infinite: true,
      focusOnSelect: true,
      prevArrow:
        "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
      nextArrow:
        "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
    });
  });

  // newletter
  // $(window).on('scroll', function () {
  // 	var scroll = $(window).scrollTop();
  //   if (scroll < 600) {
  //     $(".newsletter_form_wrapper").addClass("newsletter_active");
  //   }
  // });

  $(".close_modal").on("click", function () {
    $(".newsletter_form_wrapper").removeClass("newsletter_active");
  });

  $(document).click(function (event) {
    if (!$(event.target).closest(".newsletter_form_inner").length) {
      $("body")
        .find(".newsletter_form_wrapper")
        .removeClass("newsletter_active");
    }
  });

  $(".Categories_togler").on("click", function () {
    $(".catdropdown_menu").toggleClass("dropdown_menu_active");
  });
  $(document).click(function (event) {
    if (
      !$(event.target).closest(".Categories_togler, .catdropdown_menu").length
    ) {
      $("body").find(".catdropdown_menu").removeClass("dropdown_menu_active");
    }
  });

  // search home6
  $(".home6_search_toggle").on("click", function () {
    $(".menu_search_popup").toggleClass("active");
  });
  $(".home6_search_hide").on("click", function () {
    $(".menu_search_popup").removeClass("active");
  });
  $(document).click(function (event) {
    if (
      !$(event.target).closest(".home6_search_toggle, .menu_search_popup")
        .length
    ) {
      $("body").find(".menu_search_popup").removeClass("active");
    }
  });

  // FOR SIGNUP MODAL PROBLEM
  $(document).on("show.bs.modal", function (event) {
    if (!event.relatedTarget) {
      $(".modal").not(event.target).modal("hide");
    }
    if ($(event.relatedTarget).parents(".modal").length > 0) {
      $(event.relatedTarget).parents(".modal").modal("hide");
    }
  });

  $(document).on("shown.bs.modal", function (event) {
    if ($("body").hasClass("modal-open") == false) {
      $("body").addClass("modal-open");
    }
  });

  // elevati zoom
  $('[data-fancybox="gallery"]').fancybox({
    buttons: [
      "slideShow",
      "thumbs",
      "zoom",
      "fullScreen",
      "share",
      "close"
    ],
    loop: false,
    protect: true
  });

  Fancybox.bind("[data-fancybox]", {
    // Your custom options
  });

  var colors = [];


    $(".image-selected").mouseover(function(){
        $(this).elevateZoom({
            scrollZoom: true,
            zoomWindowWidth: 400,
            zoomWindowHeight: 400,
          });
      });
    $('.image-selected').each(function() {


    });


  // DATE RANGEPICKER ACTIVATION
  $(function() {
    $('input[name="daterange"]').daterangepicker({
      opens: 'left',
      showDropdowns: true,
      linkedCalendars: false,
      isCustomDate: true,
      minYear: 2023,
      "autoApply": false,
      startDate: '03/05/2023', endDate: '03/06/2050',
      applyButtonClasses :" o_land_primary_btn small_btn radius_5px flex-fill shadow-none",
      cancelButtonClasses :" o_land_primary_btn2 small_btn radius_5px flex-fill shadow-none"
    }, function(start, end, label) {
      // console.log(start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'))
      // console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
  });

  // active dashboard menu
  jQuery(function ($) {
    var path = window.location.href;
    $(".dashboard_sidebar_menuList a").each(function () {
      if (this.href === path) {
        $(this).addClass("active");
      }
    });
  });
  $(document).ready(function () {
    $("#date_dynamic").html(new Date().getFullYear());
  });



  var fileInput = document.getElementById("browseFile");
  if (fileInput) {
    fileInput.addEventListener("change", showFileName);

    function showFileName(event) {
      var fileInput = event.srcElement;
      var fileName = fileInput.files[0].name;
      document.getElementById("placeholderInput").placeholder = fileName;
    }
  }

  var fileInput = document.getElementById("browseDoc");
  if (fileInput) {
    fileInput.addEventListener("change", showFileName);

    function showFileName(event) {
      var fileInput = event.srcElement;
      var fileName = fileInput.files[0].name;
      document.getElementById("placeholderDoc").placeholder = fileName;
    }
  }



})(jQuery);

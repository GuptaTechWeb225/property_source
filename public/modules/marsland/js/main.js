/*----------------------------------------------
    Index Of Script
------------------------------------------------

    @version         : 
    @Template Name   : 
    @Template author : 
    
    :: Loader                       :: Nice Scroll js             
    :: Data-background              :: Hover Tilt Effect          
    :: Light & Dark Mode            :: Odometer Counter           
    :: Custom  Dropdown             :: Select 2                   
    :: Drag Drop Section            :: Slick Nav                  
    :: Multi Step Course            :: Course Carousel            


------------------------------------------------
    End-of Script
------------------------------------------------*/

(function ($) {
  'use strict';

  /*-----------------------------------
    Loader
  -----------------------------------*/
  $(document).ready(function () {
      $('.preloader').fadeOut('slow');
  });

/*-----------------------------------
  Whats App
-----------------------------------*/
  $(window).on('scroll', function () {
    var scroll = $(window).scrollTop();
    if (scroll < 600) {
        $('#contact-whatsApp').fadeOut(300);
    } else {
        $('#contact-whatsApp').fadeIn(300);
    }
  });

/*-----------------------------------
Sticky And Scroll Up
-----------------------------------*/
  $(window).on('scroll', function () {
    var scroll = $(window).scrollTop();
    if (scroll < 400) {
        $('.header-sticky').removeClass('sticky-bar');
        $('#back-top').fadeOut(500);
    } else {
        $('.header-sticky').addClass('sticky-bar');
        $('#back-top').fadeIn(500);
    }
  });


  /*-----------------------------------
    Data-background
  -----------------------------------*/
  $('[data-background]').each(function () {
      $(this).css(
          'background-image',
          'url(' + $(this).attr('data-background') + ')'
      );
  });

  /*----------------------------------------------
    Light & Dark Mode 
  ----------------------------------------------*/
  // var dark = false;
  // const lightDark = () => {
  //     if(localStorage.getItem("isDarkMode") == 'true'){
  //       $('html').addClass("dark-mode");
  //       $('.change-mode i').attr("class", "ri-moon-fill","ri-sun-line")
  //       dark = true;

  //       // User profile Dropdown setting
  //       $(".change-mode").addClass("dark-mode");
  //     }else{
  //       $('.change-mode i').attr("class", "ri-sun-line","ri-moon-fill")
  //       $('html').removeClass("dark-mode");
  //       $('html').addClass("light-mode");
  //       dark = false;

  //       // User profile Dropdown setting
  //       $(".change-mode").removeClass("dark-mode");
  //     }
  // }
  // $(".change-mode").on("click", function () {    
  //     dark = dark ? false : true;
  //     localStorage.setItem("isDarkMode", dark);   
  //     // Profile Settings mode
  //     $(".change-mode").toggleClass("dark-mode");
  //     lightDark();
  // });
  // $(document).ready( ()=> {
  //   lightDark();
  // })

/*----------------------------------------------
  Light & Dark Mode 
----------------------------------------------*/
const lightDark = () => {
  const prefersDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
  const storedMode = sessionStorage.getItem("isDarkMode");

  if (storedMode === 'true' || (storedMode === null && prefersDarkMode)) {
    $('html').addClass("dark-mode");
    $('.change-mode i').attr("class", "ri-moon-fill");
  } else {
    $('.change-mode i').attr("class", "ri-sun-line");
    $('html').removeClass("dark-mode");
  }
};

$(".change-mode").on("click", function () {
  const isDarkMode = !($('html').hasClass("dark-mode"));
  sessionStorage.setItem("isDarkMode", isDarkMode);
  // Toggle icon class
  $(".change-mode i").toggleClass("ri-moon-fill ri-sun-line");
  // Toggle dark mode class
  $('html').toggleClass("dark-mode", isDarkMode);
});

$(document).ready(() => {
  lightDark();
});

  
  /*-----------------------------------
    Custom  Dropdown
  -----------------------------------*/
  $(function () {
      $('.dropdown-toggle').click(function () {
        $(this).next('.dropdown').slideToggle();
      });

      $(document).click(function (e) {
        var target = e.target;
        if (
          !$(target).is('.dropdown-toggle') &&
          !$(target).parents().is('.dropdown-toggle')
        ) {
          //{ $('.dropdown').hide(); }
          $('.dropdown').slideUp();
        }
      });
  });


  /*-----------------------------------
    slider-active
  -----------------------------------*/
  function mainSlider() {
    var BasicSlider = $('.slider-active');
    BasicSlider.on('init', function (e, slick) {
      var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
      doAnimations($firstAnimatingElements);
    });
    BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
      var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
      doAnimations($animatingElements);
    });
    BasicSlider.slick({
      autoplay: true,
      autoplaySpeed: 4000,
      dots: false,
      fade: true,
      arrows: false, 
      prevArrow: '<button type="button" class="slick-prev"><i class="ti-angle-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="ti-angle-right"></i></button>',
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false
          }
        }
      ]
    });

    function doAnimations(elements) {
      var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
      elements.each(function () {
        var $this = $(this);
        var $animationDelay = $this.data('delay');
        var $animationType = 'animated ' + $this.data('animation');
        $this.css({
          'animation-delay': $animationDelay,
          '-webkit-animation-delay': $animationDelay
        });
        $this.addClass($animationType).one(animationEndEvents, function () {
          $this.removeClass($animationType);
        });
      });
    }
  }
  mainSlider();


  /*----------------------------------------------
    slider-screen-active
  ----------------------------------------------*/
  $('.slider-screen-active').slick({
      dots: true,
      infinite: true,
      autoplaySpeed: 400,
      // fade: true,
      // cssEase: 'linear',
      arrows : false,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
  });
  $('.single-best-product').mouseover(function() {
      const child = $(this).find('.slider-screen-active');
      child.slick('play');
  });

  $('.single-best-product').mouseout(function() {
    const child = $(this).find('.slider-screen-active');
    child.slick('pause');
  });
    

        /*------------------------------
          payment gateway selection
      -------------------------------*/
      $(".payment-gateway-list li").on('click', function () {
        $(".payment-gateway-list li").removeClass("selected");
        $(this).addClass("selected");
    })

    

  /*----------------------------------------------
    Product Features Slider
  ----------------------------------------------*/
  $('.slider-product-features').slick({
      dots: true,
      infinite: true,
      autoplaySpeed: 3000,
      arrows : false,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      margin: 24,

      responsive: [{
        breakpoint: 1400,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        }
      }
    ]

  });

  /*----------------------------------------------
    Testimonial active
  ----------------------------------------------*/
  $('.testimonial-active').slick({
      dots: true,
      infinite: true,
      autoplaySpeed: 400,
      // fade: true,
      // cssEase: 'linear',
      arrows : false,
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplay: false,
      margin: 24,

      responsive: [
        {
          breakpoint: 800,
            settings: {
              slidesToShow: 1,
            }
        }
      ]
  });

  
  /*----------------------------------------------
    Testimonial active
  ----------------------------------------------*/
  $('.hero-gallery-slider').slick({
      dots: false,
      infinite: true,
      autoplaySpeed: 3000,
      autoplay: true,
      fade: true,
      // cssEase: 'linear',
      arrows : false,
      slidesToShow: 1,
      slidesToScroll: 1,
      margin: 24,

      responsive: [
        {
          breakpoint: 800,
            settings: {
              slidesToShow: 1,
            }
        }
      ]
  });

  
  /*----------------------------------------------
    Select 2
  ----------------------------------------------*/
  $(".select2").select2({
    placeholder: "Choose one",
    width: "100%",
  });


  /*----------------------------------------------
    Custom Accordion  [ Course Upload ]
  ----------------------------------------------*/
  $(document).ready(function(){
      $('.custom-accordion > .single-accordion > .accordion-body').hide();
      $(document).on('click', '.course-section-title', (e)=>{

        // up-down Arrow
        $('.course-section-title').addClass('active');
        $(this).siblings().removeClass('active');

        $('.custom-accordion > .single-accordion > .accordion-body').slideUp();
        $(e.target).next().show();
        
      })
  });

  /*-----------------------------------
    Custom Popup Modal
  -----------------------------------*/
  $(document).on('click', '.close-icon, .custom-modal-overlay', function() {
      $('.modal-wrapper, .custom-modal-overlay').removeClass('active');
  });
  $(document).on('click', '.popup-modal', function() {
      $('.modal-wrapper, .custom-modal-overlay').addClass('active');
  });

  /*-----------------------------------
    Categories Sidebar
  -----------------------------------*/
  (function () {
      var sidebar = document.getElementById('ot-sidebar');
      if ($('#ot-sidebar').length > 0){
        var sidebarOverlay = document.getElementsByClassName('ot-sidebar-overlay')[0];
        var sidebarBtnClose = document.getElementById('otSidebarBtnClose');
        var sidebarBtnOpen = document.getElementById('otSidebarBtnOpen');
  
        var openSidebar = function () {
          sidebarOverlay.style.width = '100%';
          sidebar.style.left = '0';
        };
  
        var closeSidebar = function (e) {
          e.cancelBubble = true;
          sidebarOverlay.style.width = '0';
          sidebar.style.left = '-80%';
        };
  
        sidebarOverlay.addEventListener('click', closeSidebar);
        sidebarBtnClose.addEventListener('click', closeSidebar);
        sidebarBtnOpen.addEventListener('click', openSidebar);
      } 
  })();

  /*-----------------------------------
    Slick Nav [ Mobile Menu ]
  -----------------------------------*/
  var menu = $('ul#navigation');
  if (menu.length) {
    menu.slicknav({
      prependTo: '.mobile_menu',
      closedSymbol: '+',
      openedSymbol: '-',
    });
  }

  /*-----------------------------------
    File Upload
  -----------------------------------*/
  var fileInp = document.getElementById("fileBrouse");
  var fileInp2 = document.getElementById("fileBrouse2");
  var fileInp3 = document.getElementById("fileBrouse3");
  var fileInp4 = document.getElementById("fileBrouse4");
  if (fileInp) {
    fileInp.addEventListener("change", showFileName);
    function showFileName(event) {
      var fileInp = event.srcElement;
      var fileName = fileInp.files[0].name;
      document.getElementById("placeholder").placeholder = fileName;
    }
  }
  if (fileInp2) {
    fileInp2.addEventListener("change", showFileName);
    function showFileName(event) {
      var fileInp = event.srcElement;
      var fileName = fileInp.files[0].name;
      document.getElementById("placeholder2").placeholder = fileName;
    }
  }
  if (fileInp3) {
    fileInp3.addEventListener("change", showFileName);

    function showFileName(event) {
      var fileInp = event.srcElement;
      var fileName = fileInp.files[0].name;
      document.getElementById("placeholder3").placeholder = fileName;
    }
  }


  /*-----------------------------------
    WOW active
  -----------------------------------*/
  new WOW().init();

  /*----------------------------------------------
    Nice Scroll js
  ----------------------------------------------*/
  $(".nice-scroll").niceScroll({});
  
  /*-----------------------------------
    Hover Tilt Effect
  -----------------------------------*/
  $('.tilt-effect').tilt({
      maxTilt: 6,
      easing: 'cubic-bezier(.03,.98,.52,.99)',
      speed: 500,
      transition: true,
  });
  
  /*----------------------------------------------
      Plugin Activision
      --Odometer Counter--
  ----------------------------------------------*/        
    $('.odometer').appear(function (e) {
      var odo = jQuery(".odometer");
      odo.each(function () {
      var countNumber = jQuery(this).attr("data-count");
      jQuery(this).html(countNumber);
      });
  });

  /*------------------------------
    All clear Tag
  -------------------------------*/
  $('.clear').on('click', function(){
      $(".single-search-tag").remove()
  });

  /*------------------------------
    Search Tags clear
  -------------------------------*/
  $(".search-tags i").on('click', function () {
      $(this).parent().fadeOut()
  });

  /*------------------------------
    Clear section [ Cart page]
  -------------------------------*/
  $('.clear-cart').on('click', function(){
      $(this).parent().parent().parent().remove()
  });

  /*----------------------------------------------
    Panel sidebar Menu
  ----------------------------------------------*/
  $(document).on('click', '.panel-sidebar-list .has-children a', function(e) {
    var db = $(this).parent('.has-children');
    if (db.hasClass('open')) {
        db.removeClass('open');
        db.find('.submenu').children('.has-children').removeClass("open"); //2nd children remove 
        db.find('.submenu').removeClass('open');
        db.find('.submenu').slideUp(300, "swing");
    } else {
        db.addClass('open');
        db.children('.submenu').slideDown(300, "swing");
        db.siblings('.has-children').children('.submenu').slideUp(300, "swing");
        db.siblings('.has-children').removeClass('open');
    }
  });

  /*----------------------------------------------
    Panel sidebar Menu Responsive
  ----------------------------------------------*/
  $(document).on('click', '.close-sidebar, .sidebar-body-overlay', function() {
      $('.panel-sidebar-close, .panel-sidebar, .sidebar-body-overlay').removeClass('active');
  });
  $(document).on('click', '.sidebar-icon', function() {
      $('.panel-sidebar-close, .panel-sidebar, .sidebar-body-overlay').addClass('active');
  });


  /*-----------------------------------
    Tab & Grid View Button color active
  -----------------------------------*/
  $(".tab-grid button").click(function () {
      $(this).addClass('active').siblings().removeClass('active');
  });

  /*-----------------------------------
    Tab vew & grid Vew Content
  -----------------------------------*/
  $(document).on("click", ".grid-view", function (){
      $(this).parent().parent().parent().parent().parent().parent().parent().find(".view-wrapper").addClass("col-xl-12").removeClass("col-xl-4 col-lg-6 col-md-6 col-sm-12");
      $(this).parent().parent().parent().parent().parent().parent().parent().parent().find(".single-product").addClass("grids-views");
  });
  $(document).on("click", ".tab-view", function (){
      $(this).parent().parent().parent().parent().parent().parent().parent().find(".view-wrapper").removeClass("col-xl-12").addClass("col-xl-4 col-lg-6 col-md-6 col-sm-12");
      $(this).parent().parent().parent().parent().parent().parent().parent().parent().find(".single-product").removeClass("grids-views");
  });


    /*-----------------------------------
    Feedback Ratting Star
  -----------------------------------*/
  $('#stars i').on('mouseover', function(){

    var onStar = parseInt($(this).data('value'), 10);  
    $(this).parent().children('i.submit-ratting').each(function(e){
        if (e < onStar) {
            $(this).addClass('hover');
        }
        else {
          $(this).removeClass('hover');
        }
    });
}).on('mouseout', function(){
    $(this).parent().children('i.submit-ratting').each(function(e){
        $(this).removeClass('hover');
    });
});
$(document).on('click', '.submit-ratting', function(e) {
    var onStar = parseInt($(this).data('value'), 10);  
    $(this).parent().children('i.submit-ratting').each(function(e){
        if (e < onStar) {
            $(this).addClass('text-yellow');
        }
        else {
            $(this).removeClass('text-yellow');
        }
    });
    $('#ratingVal').val(onStar);
});



  /*-----------------------------------
    Back To Top
  -----------------------------------*/
  (function () {
    var progressPath = document.querySelector('.progressParent path');
    var pathLength = progressPath?.getTotalLength();
    if (pathLength) {        
      progressPath.style.transition = progressPath.style.WebkitTransition =
        'none';
      progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
      progressPath.style.strokeDashoffset = pathLength;
      progressPath.getBoundingClientRect();
      progressPath.style.transition = progressPath.style.WebkitTransition =
        'stroke-dashoffset 10ms linear';
      var updateProgress = function () {
        var scroll = $(window).scrollTop();
        var height = $(document).height() - $(window).height();
        var progress = pathLength - (scroll * pathLength) / height;
        progressPath.style.strokeDashoffset = progress;
      };
      updateProgress();
      $(window).scroll(updateProgress);
      var offset = 50;
      var duration = 550;
      jQuery(window).on('scroll', function () {
        if (jQuery(this).scrollTop() > offset) {
          jQuery('.progressParent').addClass('rn-backto-top-active');
        } else {
          jQuery('.progressParent').removeClass('rn-backto-top-active');
        }
      });
      jQuery('.progressParent').on('click', function (event) {
        event.preventDefault();
        jQuery('html, body').animate({ scrollTop: 0 }, duration);
        return false;
      });
    }

  })();

  if ($(".parallax_img").length > 0) {
    $(".parallax_img").parallax({
      scalarX: 2.0,
      scalarY: 2.0,
    });
  }


})(jQuery);








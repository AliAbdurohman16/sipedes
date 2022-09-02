/*================================================
*
* Template name : Mono
* Version       : 6.0.4
* Author        : FlaTheme
* Author URL    : http://themeforest.net/user/flatheme
*
* Table of Contents : 
* 1.  Preloaders
* 2.  Scroll Animations
* 3.  Background Image
* 4.  Header Menu
* 5.  Fullscreen Menu
* 6.  ScrollToTop
* 7.  Portfolio Masonry
* 8.  Portfolio Grid
* 9.  Slider
* 10. Blog Masonry
* 11. Masonry
* 12. Lightbox
* 13. Parallax
* 14. Countdown
* 15. Counter
* 16. Accordion
* 19. Easy Pie Chart
* 20. Google Maps
* 21. Contact Form
* 22. Shop
*
===============================================*/
"use strict";

var $htmlBody = $("html,body");
var $body = $("body");
var $windowWidth = $(window).width();

/*===============================================
  1. Preloaders
===============================================*/
$(window).on("load", function () {
  $body.addClass("loaded");
});

if ($body.attr("data-preloader") === "1") {
  $body.append($("<div class='preloader preloader-1'><div><svg class='loader-circular' viewBox='25 25 50 50'><circle class='loader-path' cx='50' cy='50' r='20'></svg></div></div>"));
}
else if ($body.attr("data-preloader") === "1-dark") {
  $body.append($("<div class='preloader preloader-1 dark'><div><svg class='loader-circular' viewBox='25 25 50 50'><circle class='loader-path' cx='50' cy='50' r='20'></svg></div></div>"));
}
else if ($body.attr("data-preloader") === "2") {
  $body.append($("<div class='preloader preloader-2'><div><span></span></div></div>"));
}
else if ($body.attr("data-preloader") === "2-dark") {
  $body.append($("<div class='preloader preloader-2 dark'><div><span></span></div></div>"));
}
else if ($body.attr("data-preloader") === "3") {
  $body.append($("<div class='preloader preloader-3'><div><span></span></div></div>"));
}
else if ($body.attr("data-preloader") === "3-dark") {
  $body.append($("<div class='preloader preloader-3 dark'><div><span></span></div></div>"));
}


/*===============================================
  2. Scroll Animations
===============================================*/
sal({
  duration: 500
});


/*===============================================
  3. Background Image
===============================================*/
$(".bg-image").each(function() {
  var bgData = $(this).attr("data-bg-src");
  $(this).css('background-image', 'url("' + bgData + '")');
});


/*===============================================
  4. Header Menu
===============================================*/
//
// Auto Hide //
//
var c, currentScrollTop = 0, header = $(".header.sticky-autohide");

$(window).on("scroll", function () {
  var a = $(window).scrollTop();
  currentScrollTop = a;

  if (c < currentScrollTop && a > 210) {
    if (!headerMenu.hasClass("show")) {
      header.addClass("hide");
    }
  } else if (c > currentScrollTop && !(a <= 210)) {
    header.removeClass("hide");
  }

  c = currentScrollTop;
});

if ($(".header.sticky-autohide:not(.header-lg, .header-xl, .absolute-light, .absolute-dark)").length) {
  $("<div class='header-placeholder'></div>").insertBefore(".header.sticky-autohide");
}
if ($(".header-lg.sticky-autohide:not(.absolute-light, .absolute-dark)").length) {
  $("<div class='header-placeholder-lg'></div>").insertBefore(".header-lg.sticky-autohide");
}
if ($(".header-xl.sticky-autohide:not(.absolute-light, .absolute-dark)").length) {
  $("<div class='header-placeholder-xl'></div>").insertBefore(".header-xl.sticky-autohide");
}

//
// Sticky //
//
if ($(".header.sticky:not(.header-lg, .header-xl, .absolute-light, .absolute-dark)").length) {
  $("<div class='header-placeholder'></div>").insertBefore(".header.sticky");
}
if ($(".header-lg.sticky:not(.absolute-light, .absolute-dark)").length) {
  $("<div class='header-placeholder-lg'></div>").insertBefore(".header-lg.sticky");
}
if ($(".header-xl.sticky:not(.absolute-light, .absolute-dark)").length) {
  $("<div class='header-placeholder-xl'></div>").insertBefore(".header-xl.sticky");
}

//
// Absolute //
//
if ($(".absolute-light").length) {
  $(window).on("scroll", function() {
    var headerFixed = $(".header.sticky-autohide, .header.sticky");
    if ($(window).scrollTop() > 10) {
      headerFixed.removeClass("absolute-light");
    }
    else {
      headerFixed.addClass("absolute-light");
    }
  });
}
if ($(".absolute-dark").length) {
  $(window).on("scroll", function() {
    var headerFixed = $(".header.sticky-autohide, .header.sticky");
    if ($(window).scrollTop() > 10) {
      headerFixed.removeClass("absolute-dark");
    }
    else {
      headerFixed.addClass("absolute-dark");
    }
  });
}

//
// Open/Close Header Menu //
//
var headerMenu = $(".header-menu");
var headerToggle = $(".header-toggle");

headerToggle.on("click", function() {
  if (headerMenu.hasClass("show")) {
    headerMenu.removeClass("show");
    headerToggle.removeClass("toggle-close");
  }
  else {
    headerMenu.addClass("show");
    headerToggle.addClass("toggle-close");
  }
});

$(document).on("click", function(e) {
  if ( $(e.target).closest(".header-menu, .header-toggle").length === 0 ) {
    if (headerMenu.hasClass("show")) {
      headerMenu.removeClass("show");
      headerToggle.removeClass("toggle-close");
    }
  }
});


//
// Dropdown Menu //
//
if ($(".nav-dropdown").length) {
  var navDropdown = $(".nav-dropdown");
  var navSubdropdown = $(".nav-subdropdown");

  //
  // Create Dropdown Toggle //
  //
  navDropdown.each(function() {
    var $this = $(this);
    $this.parent(".nav-item").children(".nav-link").addClass("d-toggle");
    $this.parent(".nav-item").append('<a class="nav-dropdown-toggle" href="#"></a>');
  });
  navSubdropdown.each(function() {
    var $this = $(this);
    $this.parent(".nav-dropdown-item").children(".nav-dropdown-link").addClass("sd-toggle");
    $this.parent(".nav-dropdown-item").append('<a class="nav-subdropdown-toggle" href="#"></a>');
  });

  //
  // Dropdown Toggle Click //
  //
  var navDropdownToggle = $(".nav-dropdown-toggle");

  navDropdownToggle.each(function() {
    var $this = $(this);
    var navDropdown = $this.parent(".nav-item").children(".nav-dropdown");

    $this.on("click", function(e) {
      if ($this.hasClass("active")) {
        $this.removeClass("active");
        navDropdown.removeClass("show");
      }
      else {
        $this.addClass("active");
        navDropdown.addClass("show");
      }
      e.preventDefault();
    });
  });

  //
  // Subdropdown Toggle Click //
  //
  var navSubdropdownToggle = $(".nav-subdropdown-toggle");

  navSubdropdownToggle.each(function() {
    var $this = $(this);
    var navSubDropdown = $this.parent(".nav-dropdown-item").children(".nav-subdropdown");

    $this.on("click", function(e) {
      if ($this.hasClass("active")) {
        $this.removeClass("active");
        navSubDropdown.removeClass("show");
      }
      else {
        $this.addClass("active");
        navSubDropdown.addClass("show");
      }
      e.preventDefault();
    });
  });
}


/*===============================================
  5. Fullscreen Menu
===============================================*/
var fm = $(".fullscreen-menu");

if (fm.length) {
  var fmToggle = $(".fm-toggle");
  var fmClose = $(".fm-close");
  //
  // Open //
  //
  fmToggle.on("click", function() {
    if (fm.hasClass("fm-show")) {
      fm.removeClass("fm-show");
    }
    else {
      fm.addClass("fm-show");
    }
  });

  //
  // Close //
  //
  fmClose.on("click", function() {
    fm.removeClass("fm-show");
    fmToggle.removeClass("fm-toggle-hide");
  });
}


/*===============================================
  6. Scroll To Top
===============================================*/
var scrollTopBtn = $(".scrolltotop");

if (scrollTopBtn.length) {
  //
  // Show/Hide button //
  //
  $(window).on("scroll", function(){
    if ($(this).scrollTop() > 700) { // 700px from top
      scrollTopBtn.addClass("scrolltotop-show");
    }
    else {
      scrollTopBtn.removeClass("scrolltotop-show");
    }
  });
}


/*===============================================
  7. Portfolio Masonry
===============================================*/
var pMasonry = $(".portfolio-wrapper:not(.row)");

if (pMasonry.length) {
  pMasonry.imagesLoaded(function() {
    var $pWrapper = $(".portfolio-wrapper").isotope({
      itemSelector: ".portfolio-item",
      transitionDuration: 250 // 0.25 second
    });
    var filter = $(".filter ul li");

    // Portfolio Filter //
    filter.on("click", function() {
      var filterValue = $(this).attr("data-filter");
      $pWrapper.isotope({ filter: filterValue });

      filter.removeClass("active");
      $(this).addClass("active");
    });
  });
}


/*===============================================
  8. Portfolio Grid
===============================================*/
var pGrid = $(".portfolio-wrapper.row");

if (pGrid.length) {
  var mixer = mixitup('.portfolio-wrapper.row', {
    selectors: {
        target: '.portfolio-item'
    },
    animation: {
        duration: 250
    }
  });
}


/*===============================================
  9. Slider
===============================================*/
$(".owl-carousel").each( function() {
  var $carousel = $(this);

  var $defaults = {
    rewind: true,
    navText: ["<i class='bi bi-arrow-left-short'></i>","<i class='bi bi-arrow-right-short'></i>"],
    autoHeight: true, 
    autoplayTimeout: 4000, 
    autoplaySpeed: 400, 
    autoplayHoverPause: true, 
    navSpeed: 300, 
    dotsSpeed: 300
  }

  var $options = {
    items: $carousel.data("owl-items"),
    margin: $carousel.data("owl-margin"),
    loop: $carousel.data("owl-loop"),
    center: $carousel.data("owl-center"),
    nav: $carousel.data("owl-nav"),
    rewind: $carousel.data("owl-rewind"),
    dots: $carousel.data("owl-dots"),
    autoplay: $carousel.data("owl-autoplay")
  }

  var $responsive = {
    responsive: {
      0 : {
        items: $carousel.data("owl-xs")
      },
      576 : {
        items: $carousel.data("owl-sm")
      },
      768 : {
        items: $carousel.data("owl-md")
      },
      992 : {
        items: $carousel.data("owl-lg")
      },
      1200 : {
        items: $carousel.data("owl-xl")
      }
    }
  }

  if ($carousel.hasClass("product-carousel")) {
    var $productCarousel = {
      items:1,
      animateOut: 'fadeOut',
      URLhashListener:true,
      startPosition: 'URLHash'
    }
  }

  $carousel.owlCarousel( $.extend( $defaults, $options, $responsive, $productCarousel) );

  var customPrev = $("#customPrev");
  var customNext = $("#customNext");

  customNext.on("click", function(){
    $carousel.trigger("next.owl.carousel", [300]);
  });
  customPrev.on("click", function(){
    $carousel.trigger("prev.owl.carousel", [300]);
  });
});


/*===============================================
  10. Blog Masonry
===============================================*/
var $blogMasonry = $(".blog-masonry").imagesLoaded( function() {
  $blogMasonry.masonry({
    itemSelector: '.blog-post-box'
  });
});


/*===============================================
  11. Masonry
===============================================*/
var $masonryGrid = $(".masonry").imagesLoaded( function() {
  $masonryGrid.masonry({
    itemSelector: '.masonry-item'
  });
});


/*===============================================
  12. Lightbox
===============================================*/
//
// Lightbox - Image //
//
var $lightboxImage = $(".lightbox-image-link, .lightbox-image-box");

$lightboxImage.each(function () {
  var $this = $(this);
  $this.magnificPopup({
    type: 'image',
    fixedContentPos: false,
    removalDelay: 200,
    closeOnContentClick: true, 
    image: {
      titleSrc: 'data-image-title'
    }
  });
});

//
// Lightbox - Media //
//
var $lightboxMedia = $(".lightbox-media-link, .lightbox-media-box");

$lightboxMedia.each(function() {
  var $this = $(this);
  $this.magnificPopup({
    type: "iframe",
    fixedContentPos: false,
    removalDelay: 200,
    preloader: false,
    iframe: {
      patterns: {
        youtube: {
          index: 'youtube.com/',
          id: 'v=',
          src: '//www.youtube.com/embed/%id%?autoplay=1&rel=0'
        },
          vimeo: {
          index: 'vimeo.com/',
          id: '/',
          src: '//player.vimeo.com/video/%id%?autoplay=1'
        }
      },
      srcAction: "iframe_src" 
    }
  });
});

//
// Lightbox - Gallery //
//
var $gallery = $(".gallery-wrapper");

if ($gallery.length) {
  $gallery.each(function() {
    var $this = $(this);
    $this.magnificPopup({
      delegate: 'a',
      removalDelay: '200',
      type: 'image',
      fixedContentPos: false,
      gallery: {
          enabled: true
      },
      image: {
        titleSrc: 'data-gallery-title'
      }
    });
  });
}


/*===============================================
  13. Parallax
===============================================*/
if ($windowWidth > 1200) {
  var parallaxBg = $(".parallax");

  if (parallaxBg.length) {
    parallaxBg.each(function() {
      $(this).parallaxie({
        speed: 0.2
      });
    });
  }
}


/*===============================================
  14. Countdown
===============================================*/
//
// Countdown - Legacy style //
//
$(".countdown").each(function() {
  var finalDate = $(this).attr('data-countdown');

  $(this).countdown(finalDate, function(event) {
    $(this).html(event.strftime(''
      + '<div><h2 class="font-weight-light margin-0">%D</h2><h6 class="font-weight-normal font-small uppercase margin-0">Days</h6></div>'
      + '<div><h2 class="font-weight-light margin-0">%H</h2><h6 class="font-weight-normal font-small uppercase margin-0">Hours</h6></div>'
      + '<div><h2 class="font-weight-light margin-0">%M</h2><h6 class="font-weight-normal font-small uppercase margin-0">Minutes</h6></div>'
      + '<div><h2 class="font-weight-light margin-0">%S</h2><h6 class="font-weight-normal font-small uppercase margin-0">Seconds</h6></div>'));
  });
});

//
// Countdown - Basic style //
//
$(".countdown-basic").each(function() {
  var finalDate = $(this).attr('data-countdown');

  $(this).countdown(finalDate, function(event) {
    $(this).html(event.strftime('%D days %H:%M:%S'));
  });
});


/*===============================================
  15. Counter
===============================================*/
$(".counter").appear(function() {

  $(this).each(function () {
    $(this).prop("Counter",0).animate({
        Counter: $(this).text()
    }, {
        duration: 3000,
        easing: "swing",
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
  });
  
},{accX: 0, accY: -10});


/*===============================================
  16. Accordion
===============================================*/
$(".accordion-title").each(function() {

  var $this = $(this);

  $this.on("click", function() {
    var accordionList = $this.parent("li");
    var accordionContent = this.nextElementSibling;

    if (accordionList.hasClass("active")) {
      accordionList.removeClass("active");
      accordionContent.style.maxHeight = null;
    }
    else {
      accordionList.addClass("active");
      if ($this.closest(".accordion").hasClass("single-open")) {
        $this.closest(".accordion").children("li").removeClass("active");
        accordionList.addClass("active");
        $this.parents(".single-open").find(".accordion-content").css("max-height", "0");
      }
      accordionContent.style.maxHeight = accordionContent.scrollHeight + "px";
    }
  });

  //
  // Give max-height to Accordion's active content //
  //
  if ($this.parents(".accordion").find("li").hasClass("active")) {
    var accordionActiveContent = $this.parents(".accordion").find("li.active").children(".accordion-content");
    var accordionHeight = accordionActiveContent.prop("scrollHeight");
    
    accordionActiveContent.css({'max-height': accordionHeight + "px"});
  }

});


/*===============================================
  19. Easy Pie Chart
===============================================*/
$(".pie-chart").appear(function() {

  $(this).each(function() {
    $(this).easyPieChart({
      lineCap: 'square',
      onStep: function(from, to, percent) {
        $(this.el).find('.percent').text(Math.round(percent));
      }
    });
  });
  
},{accX: 0, accY: -10});


/*===============================================
  20. Google Maps
===============================================*/
var mapCanvas = $(".gmap");

if (mapCanvas.length) {
  var m,divId,initLatitude, initLongitude, map;

  for (var i = 0; i < mapCanvas.length; i++) {
    m = mapCanvas[i];

    initLatitude = m.dataset["latitude"];
    initLongitude = m.dataset["longitude"];
    divId = "#"+ m["id"];

    map = new GMaps({
      el: divId,
      lat: initLatitude,
      lng: initLongitude,
      zoom: 16,
      scrollwheel: false,
      styles: [
          /* style your map at https://snazzymaps.com/editor and paste JSON here */
      ]
    });

    map.addMarker({
      lat : initLatitude,
      lng : initLongitude
    });
  }
}


/*===============================================
  21. Contact Form
===============================================*/
$("#contactform").on("submit", function(e) {
  var name = $("#name").val();
  var email = $("#email").val();
  var subject = $("#subject").val();
  var message = $("#message").val();

  if (name === "") {
    $("#name").addClass("error-color");
  }
  if (email === "") {
    $("#email").addClass("error-color");
  }
  if (subject === "") {
    $("#subject").addClass("error-color");
  }
  if (message === "") {
    $("#message").addClass("error-color");
  }

  else {
    $.ajax({
      url:"assets/php/contact-form.php",
      data:$(this).serialize(),
      type:"POST",
      success:function(data){
        $("#success").addClass("show-result"); //=== Show Success Message==
        $("#contactform").each(function(){
          this.reset();
        });
      },
      error:function(data){
        $("#error").addClass("show-result"); //===Show Error Message====
      }
    });
    var forms = $("#contactform input, #contactform textarea");
    forms.removeClass("error-color");
  }

  e.preventDefault();
});


/*===============================================
  22. Shop
===============================================*/
$(".product-quantity .qnt").append('<a class="dec qnt-button" href="#">-</a><a class="inc qnt-button" href="#">+</a>');

$(".qnt-button").on("click", function(e) {

  var $button = $(this);
  var oldValue = $button.parent().find("input").val();

  if ($button.text() == "+") {
    var newVal = parseFloat(oldValue) + 1;
  } else {
   // Don't allow decrementing below zero
    if (oldValue > 1) {
      var newVal = parseFloat(oldValue) - 1;
    } else {
      newVal = 1;
    }
  }

  $button.parent().find("input").val(newVal);
  e.preventDefault();

});
/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


function ShowNoto(className, text) {
  //Create The Element
  $('body').append('<div class="noto"></div>');
  $('.noto').html(text).addClass(className).fadeIn('fast').delay(3000).fadeOut('fast');
}

$(window).on('load', function () {
  /*------------------
  	Preloder
  --------------------*/
  $(".loader").fadeOut();
  $("#preloder").delay(400).fadeOut("slow");
});

(function ($) {
  /*------------------
  	Navigation
  --------------------*/
  $('.main-menu').slicknav({
    prependTo: '.main-navbar .container'
  });
  /*------------------
  	Category menu
  --------------------*/

  $('.category-menu > li').hover(function (e) {
    $(this).addClass('active');
    e.preventDefault();
  });
  $('.category-menu').mouseleave(function (e) {
    $('.category-menu li').removeClass('active');
    e.preventDefault();
  });
  /*------------------
  	Background Set
  --------------------*/

  $('.set-bg').each(function () {
    var bg = $(this).data('setbg');
    $(this).css('background-image', 'url(' + bg + ')');
  });
  /*------------------
  	Hero Slider
  --------------------*/

  var hero_s = $(".hero-slider");
  hero_s.owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    items: 1,
    dots: true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
    smartSpeed: 1200,
    autoHeight: false,
    autoplay: true,
    onInitialized: function onInitialized() {
      var a = this.items().length;
      $("#snh-1").html("<span>1</span><span>" + a + "</span>");
    }
  }).on("changed.owl.carousel", function (a) {
    var b = --a.item.index,
        a = a.item.count;
    $("#snh-1").html("<span> " + (1 > b ? b + a : b > a ? b - a : b) + "</span><span>" + a + "</span>");
  });
  hero_s.append('<div class="slider-nav-warp"><div class="slider-nav"></div></div>');
  $(".hero-slider .owl-nav, .hero-slider .owl-dots").appendTo('.slider-nav');
  /*------------------
  	Brands Slider
  --------------------*/

  $('.product-slider').owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    margin: 30,
    autoplay: true,
    navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
    responsive: {
      0: {
        items: 1
      },
      480: {
        items: 2
      },
      768: {
        items: 3
      },
      1200: {
        items: 4
      }
    }
  });
  $('.product-slider-small').owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    margin: 30,
    autoplay: true,
    navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
    responsive: {
      0: {
        items: 1
      },
      480: {
        items: 2
      }
    }
  });
  /*------------------
  	Popular Services
  --------------------*/

  $('.popular-services-slider').owlCarousel({
    loop: true,
    dots: false,
    margin: 40,
    autoplay: true,
    nav: true,
    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      },
      991: {
        items: 3
      }
    }
  });
  /*------------------
  	Accordions
  --------------------*/

  $('.panel-link').on('click', function (e) {
    $('.panel-link').removeClass('active');
    var $this = $(this);

    if (!$this.hasClass('active')) {
      $this.addClass('active');
    }

    e.preventDefault();
  });
  /*-------------------
  	Range Slider
  --------------------- */

  var rangeSlider = $(".price-range"),
      minamount = $("#minamount"),
      maxamount = $("#maxamount"),
      minPrice = rangeSlider.data('min'),
      maxPrice = rangeSlider.data('max');
  rangeSlider.slider({
    range: true,
    min: minPrice,
    max: maxPrice,
    values: [minPrice, maxPrice],
    slide: function slide(event, ui) {
      minamount.val('L.E ' + ui.values[0]);
      maxamount.val('L.E ' + ui.values[1]);
    }
  });
  minamount.val('L.E ' + rangeSlider.slider("values", 0));
  maxamount.val('L.E ' + rangeSlider.slider("values", 1));
  /*-------------------
  	Quantity change
  --------------------- */

  var proQty = $('.pro-qty');
  proQty.prepend('<span class="dec qtybtn">-</span>');
  proQty.append('<span class="inc qtybtn">+</span>');
  proQty.on('click', '.qtybtn', function () {
    var $button = $(this);
    var oldValue = $button.parent().find('input').val();

    if ($button.hasClass('inc')) {
      var newVal = parseFloat(oldValue) + 1;
    } else {
      // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 0;
      }
    }

    $button.parent().find('input').val(newVal);
  });
  /*------------------
  	Single Product
  --------------------*/

  $('.product-thumbs-track > .pt').on('click', function () {
    $('.product-thumbs-track .pt').removeClass('active');
    $(this).addClass('active');
    var imgurl = $(this).data('imgbigurl');
    var bigImg = $('.product-big-img').attr('src');

    if (imgurl != bigImg) {
      $('.product-big-img').attr({
        src: imgurl
      });
      $('.zoomImg').attr({
        src: imgurl
      });
    }
  });
  $('.product-pic-zoom').zoom();
  /*------------------
    Wishlist Ajax Calls
  --------------------*/

  $('#product-add-to-wishlist-btn').click(function () {
    //Update the Icon
    $(this).html('<i class="fas fa-spinner fa-spin"></i> اضافة الى المفضلة');
    var ActionRoute = $(this).data('action');
    var ItemId = $(this).data('id');
    var UserId = $(this).data('user');
    var That = $(this);
    $.ajax({
      method: 'post',
      url: ActionRoute,
      data: {
        'product_id': ItemId,
        'user_id': UserId
      },
      success: function success(response) {
        if (response == 'liked') {
          That.addClass('liked');
          That.html('<i class="flaticon-heart"></i> أحببته');
        } else {
          That.removeClass('liked');
          That.html('<i class="flaticon-heart"></i> اضافة الى المفضلة');
        }
      },
      error: function error(XMLHttpRequest, textStatus, errorThrown) {
        ShowNoto('noto-danger', errorThrown, 'Error');
      }
    });
  });
  $('.global-add-to-wishlist').click(function () {
    //Update the Icon
    $(this).html('<i class="fas fa-spinner fa-spin"></i>');
    var ActionRoute = $(this).data('action');
    var ItemId = $(this).data('id');
    var UserId = $(this).data('user');
    var That = $(this);
    $.ajax({
      method: 'post',
      url: ActionRoute,
      data: {
        'product_id': ItemId,
        'user_id': UserId
      },
      success: function success(response) {
        if (response == 'liked') {
          That.addClass('liked');
          That.html('<i class="flaticon-heart"></i>');
        } else {
          That.removeClass('liked');
          That.html('<i class="flaticon-heart"></i>');
        }
      },
      error: function error(XMLHttpRequest, textStatus, errorThrown) {
        ShowNoto('noto-danger', errorThrown, 'Error');
      }
    });
  });
})(jQuery);

/***/ }),

/***/ "./resources/sass/style.scss":
/*!***********************************!*\
  !*** ./resources/sass/style.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/style.scss ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\arte\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\arte\resources\sass\style.scss */"./resources/sass/style.scss");


/***/ })

/******/ });
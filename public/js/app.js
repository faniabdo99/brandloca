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


function ShowNoto(className, text, type) {
  //Create The Element
  $('body').append("\n      <div class=\"notification ".concat(className, "\">\n          <div class=\"notification-icon\">\n              <i class=\"fas fa-times\"></i>\n          </div>\n          <div class=\"notification-content\">\n              <b>\u062E\u0637\u0623</b>\n              <p>").concat(text, "</p>\n          </div>\n      </div>"));
  $('.notification').fadeIn('fast').delay(3000).fadeOut('fast');
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
    loop: false,
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
    loop: false,
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
        ShowNoto('notification-danger', errorThrown, 'Error');
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
        ShowNoto('notification-danger', errorThrown, 'Error');
      }
    });
  }); //Filter Products

  var OriginalData = $('#products-list').html();
  $('#filter-products').click(function (e) {
    e.preventDefault(); //Update the Icon

    $(this).html('<i class="fas fa-spinner fa-spin"></i>');
    $('#products-list').html('Loading ...');
    var ActionRoute = $(this).data('action');
    var Data = $(this).parent().parent().parent().serialize();
    var UserId = $(this).data('user');
    var That = $(this);
    $.ajax({
      method: 'post',
      url: ActionRoute,
      data: Data,
      success: function success(response) {
        $('#products-list').html(OriginalData);
        var CurrentProducts = $('#products-list > div');
        CurrentProducts.each(function () {
          if (!response.includes($(this).data('id'))) {
            $(this).fadeOut('fast');
          }
        });
        That.html('فلترة');
      },
      error: function error(XMLHttpRequest, textStatus, errorThrown) {
        ShowNoto('notification-danger', errorThrown, 'Error');
      }
    });
  });
  $('#add-to-cart').click(function (e) {
    e.preventDefault(); //Validate the Stuff

    var size = $('#product-cart-form input[name="size"]:checked').val();
    var color = $('#product-cart-form input[name="color"]:checked').val();
    var qty = $('#product-cart-form input[name="qty"]').val();

    if (!size) {
      ShowNoto('notification-danger', 'يرجى اختيار الحجم المطلوب', 'Error');
      return false;
    }

    if (!color) {
      ShowNoto('notification-danger', 'يرجى اختيار اللون المطلوب', 'Error');
      return false;
    }

    if (!qty || !Number.isInteger(parseInt(qty))) {
      ShowNoto('notification-danger', 'يرجى اختيار الكمية المطلوبة', 'Error');
      return false;
    } //Update the Icon


    $(this).html('<i class="fas fa-spinner fa-spin"></i>');
    var ActionRoute = $(this).data('action');
    var Data = {
      'qty': $('#product-cart-form input[name="qty"]').val(),
      'color': $('#product-cart-form input[name="color"]:checked').val(),
      'size': $('#product-cart-form input[name="size"]:checked').val(),
      'user_id': $(this).data('user'),
      'product_id': $(this).data('product')
    };
    var That = $(this);
    $.ajax({
      method: 'post',
      url: ActionRoute,
      data: Data,
      success: function success(response) {
        That.html('<i class="flaticon-bag"></i> في السلة ' + Data.qty); //Update navbar cart icon

        var CurrentValue = parseInt($('.shopping-card').find('span').html());
        $('.shopping-card').find('span').html(CurrentValue + parseInt(Data.qty));
      },
      error: function error(response, textStatus, errorThrown) {
        console.log(response);
        That.html('<i class="flaticon-bag"></i> اضف الى السلة');
        ShowNoto('notification-danger', response.responseJSON, 'Error');
      }
    });
  }); //Disable Arrows on Qty Filed

  $('.cart-qty-input').keydown(function (e) {
    if (e.which === 38 || e.which === 40) {
      e.preventDefault();
    }
  }); //Update Cart as the User Done Typing

  $('.cart-qty-input').change(function (e) {
    var ActionRoute = $(this).data('target');
    var TheItem = $(this);
    var ItemValue = $(this).val();
    $.ajax({
      'method': 'post',
      'url': ActionRoute,
      'data': {
        'qty': ItemValue
      },
      success: function success(response) {
        $("#update-cart-btn").removeClass('d-none');
      },
      error: function error(response) {
        console.log(response);
        ShowNoto('notification-danger', response.responseText, 'Error');
      }
    });
  });
  $('#cart-coupon').click(function (e) {
    e.preventDefault();
    $(this).html('<i class="fas fa-spinner fa-spin"></i>');
    var ActionRoute = $(this).data('target');
    var Data = $(this).parent('form').serialize();
    var TheButton = $(this); //Do Ajax Call

    $.ajax({
      method: 'POST',
      url: ActionRoute,
      data: Data,
      success: function success(response) {
        TheButton.html('<i class="fas fa-check text-success"></i>');
        location.reload(true);
      },
      error: function error(response) {
        TheButton.html('ادخال');
        ShowNoto('notification-danger', response.responseText, 'Error');
      }
    });
  }); //Order Trace 

  $('#trace-order-form').click(function (e) {
    e.preventDefault();
    var TrackingNumber = $(this).prev('input#tracking-number').val(); //Check if the Tracking Number exists

    if (!TrackingNumber || TrackingNumber == undefined || TrackingNumber == null) {
      $(this).prev('input#tracking-number').css('border', 'red 2px solid');
      ShowNoto('notification-danger', 'حقل رقم التتبع مطلوب!', 'Error');
      return false;
    } //All Good (Kinda)


    $(this).html('<i class="fas fa-spinner fa-spin"></i>');
    var ActionRoute = $(this).data('target');
    var Data = $(this).parent('form').serialize();
    var TheButton = $(this);
    $.ajax({
      method: 'POST',
      url: ActionRoute,
      data: Data,
      success: function success(response) {
        TheButton.html('<i class="fas fa-search"></i>');
        $('.trace-order-result').html("\n          <h4 class=\"mb-3\">\u0645\u0639\u0644\u0648\u0645\u0627\u062A \u0627\u0644\u0637\u0644\u0628</h4>\n          <table class=\"table table-striped border\">\n              <thead>\n              <tbody>\n                  <tr>\n                      <th scope=\"row\">\u0631\u0642\u0645 \u0627\u0644\u0637\u0644\u0628</th>\n                      <td>".concat(response.id, "</td>\n                    </tr>\n                    <tr>\n                      <th scope=\"row\">\u0631\u0642\u0645 \u0627\u0644\u062A\u062A\u0628\u0639</th>\n                      <td>").concat(response.tracking_number, "</td>\n                    </tr>\n                <tr>\n                  <th scope=\"row\">\u0627\u0633\u0645 \u0627\u0644\u0639\u0645\u064A\u0644</th>\n                  <td>").concat(response.name, "</td>\n                </tr>\n                <tr>\n                  <th scope=\"row\">\u062D\u0627\u0644\u0629 \u0627\u0644\u0637\u0644\u0628</th>\n                  <td>").concat(response.status, "</td>\n                </tr>\n                <tr>\n                  <th scope=\"row\">\u0627\u0644\u0645\u062D\u0627\u0641\u0638\u0629</th>\n                  <td>").concat(response.shipping_province, "</td>\n                </tr>\n                <tr>\n                  <th scope=\"row\">\u0627\u0644\u0645\u062F\u064A\u0646\u0629</th>\n                  <td>").concat(response.shipping_city, "</td>\n                </tr>\n                <tr>\n                  <th scope=\"row\">\u0627\u0644\u0639\u0646\u0648\u0627\u0646 \u0627\u0644\u062A\u0641\u0635\u064A\u0644\u064A</th>\n                  <td>").concat(response.shipping_street_address, "</td>\n                </tr>\n                <tr>\n                  <th scope=\"row\">\u0639\u062F\u062F \u0627\u0644\u0645\u0646\u062A\u062C\u0627\u062A</th>\n                  <td>").concat(response.items.length, "</td>\n                </tr>\n                <tr>\n                  <th scope=\"row\">\u0627\u0644\u0633\u0639\u0631 \u0627\u0644\u0627\u062C\u0645\u0627\u0644\u064A</th>\n                  <td>").concat(response.total, " L.E</td>\n                </tr>\n                <tr>\n                  <th scope=\"row\">\u0637\u0631\u064A\u0642\u0629 \u0627\u0644\u062F\u0641\u0639</th>\n                  <td>").concat(response.payment_method_text, "</td>\n                </tr>\n                <tr>\n                  <th scope=\"row\">\u062A\u0627\u0631\u064A\u062E \u0627\u0644\u0637\u0644\u0628</th>\n                  <td>").concat(response.order_date, "</td>\n                </tr>\n              </tbody>\n            </table>\n          "));
        console.log(response);
      },
      error: function error(response) {
        TheButton.html('<i class="fas fa-search"></i>');
        ShowNoto('notification-danger', response.responseText, 'Error');
      }
    });
  });

  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');

    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];

      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }

      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }

    return "";
  } //PWA Add to home 


  var deferredPrompt;
  var addBtn = document.querySelector('.add-button');
  addBtn.style.display = 'none';
  window.addEventListener('beforeinstallprompt', function (e) {
    // Prevent Chrome 67 and earlier from automatically showing the prompt
    e.preventDefault(); // Stash the event so it can be triggered later.

    deferredPrompt = e; // Update UI to notify the user they can add to home screen

    addBtn.style.display = 'block';
    addBtn.addEventListener('click', function (e) {
      // hide our user interface that shows our A2HS button
      addBtn.style.display = 'none'; // Show the prompt

      deferredPrompt.prompt(); // Wait for the user to respond to the prompt

      deferredPrompt.userChoice.then(function (choiceResult) {
        if (choiceResult.outcome === 'accepted') {
          console.log('User accepted the A2HS prompt');
        } else {
          console.log('User dismissed the A2HS prompt');
        }

        deferredPrompt = null;
      });
    });
  });
  $('#close-pwa').click(function () {
    alert("CLicked");
    $(this).parent().parent().fadeOut('fast');
    setCookie('pwa-hidden', true, 15);
  });
})(jQuery);

/***/ }),

/***/ "./resources/sass/admin/admin.scss":
/*!*****************************************!*\
  !*** ./resources/sass/admin/admin.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/print.scss":
/*!***********************************!*\
  !*** ./resources/sass/print.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

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
/*!*****************************************************************************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/style.scss ./resources/sass/print.scss ./resources/sass/admin/admin.scss ***!
  \*****************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /var/www/html/arte_online/resources/js/app.js */"./resources/js/app.js");
__webpack_require__(/*! /var/www/html/arte_online/resources/sass/style.scss */"./resources/sass/style.scss");
__webpack_require__(/*! /var/www/html/arte_online/resources/sass/print.scss */"./resources/sass/print.scss");
module.exports = __webpack_require__(/*! /var/www/html/arte_online/resources/sass/admin/admin.scss */"./resources/sass/admin/admin.scss");


/***/ })

/******/ });
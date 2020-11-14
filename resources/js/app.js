'use strict';
function ShowNoto(className,text,type){
    //Create The Element
    $('body').append(`
      <div class="notification ${className}">
          <div class="notification-icon">
              <i class="fas fa-times"></i>
          </div>
          <div class="notification-content">
              <b>خطأ</b>
              <p>${text}</p>
          </div>
      </div>`);
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
        prependTo: '.main-navbar .container',
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
        onInitialized: function () {
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
                items: 1,
            },
            480: {
                items: 2,
            },
            768: {
                items: 3,
            },
            1200: {
                items: 4,
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
                items: 1,
            },
            480: {
                items: 2,
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
                items: 1,
            },
            768: {
                items: 2,
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
        slide: function (event, ui) {
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
    $('#product-add-to-wishlist-btn').click(function(){
      //Update the Icon
      $(this).html('<i class="fas fa-spinner fa-spin"></i> اضافة الى المفضلة');
      var ActionRoute = $(this).data('action');
      var ItemId = $(this).data('id');
      var UserId = $(this).data('user');
      var That = $(this);
      $.ajax({
        method: 'post',
        url: ActionRoute,
        data: {'product_id': ItemId,'user_id': UserId},
        success: function(response){
          if(response == 'liked'){
            That.addClass('liked');
            That.html('<i class="flaticon-heart"></i> أحببته');
          }else{
            That.removeClass('liked');
            That.html('<i class="flaticon-heart"></i> اضافة الى المفضلة');
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
          ShowNoto('notification-danger' , errorThrown , 'Error');
        }
      });
    });
    $('.global-add-to-wishlist').click(function(){
      //Update the Icon
      $(this).html('<i class="fas fa-spinner fa-spin"></i>');
      var ActionRoute = $(this).data('action');
      var ItemId = $(this).data('id');
      var UserId = $(this).data('user');
      var That = $(this);
      $.ajax({
        method: 'post',
        url: ActionRoute,
        data: {'product_id': ItemId,'user_id': UserId},
        success: function(response){
          if(response == 'liked'){
            That.addClass('liked');
            That.html('<i class="flaticon-heart"></i>');
          }else{
            That.removeClass('liked');
            That.html('<i class="flaticon-heart"></i>');
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
          ShowNoto('notification-danger' , errorThrown , 'Error');
        }
      });
    });

    //Filter Products
    var OriginalData = $('#products-list').html();
    $('#filter-products').click(function(e){
      e.preventDefault();
      //Update the Icon
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
        success: function(response){
          $('#products-list').html(OriginalData);
          var CurrentProducts = $('#products-list > div');
          CurrentProducts.each(function(){
            if(!response.includes($(this).data('id'))){$(this).fadeOut('fast');}
          });
          That.html('فلترة');
      },
        error: function(XMLHttpRequest, textStatus, errorThrown){
          ShowNoto('notification-danger' , errorThrown , 'Error');
        }
      });
    });

    $('#add-to-cart').click(function(e){
      e.preventDefault();
      //Validate the Stuff
      var size = $('#product-cart-form input[name="size"]:checked').val();
      var color = $('#product-cart-form input[name="color"]:checked').val();
      var qty = $('#product-cart-form input[name="qty"]').val();
      if(!size){
        ShowNoto('notification-danger' , 'يرجى اختيار الحجم المطلوب' , 'Error');
        return false;
      }
      if(!color){
        ShowNoto('notification-danger' , 'يرجى اختيار اللون المطلوب' , 'Error');
        return false;
      }
      if(!qty || !Number.isInteger(parseInt(qty))){
        ShowNoto('notification-danger' , 'يرجى اختيار الكمية المطلوبة' , 'Error');
        return false;
      }
      //Update the Icon
      $(this).html('<i class="fas fa-spinner fa-spin"></i>');
      var ActionRoute = $(this).data('action');
      var Data = {
        'qty': $('#product-cart-form input[name="qty"]').val(),
        'color': $('#product-cart-form input[name="color"]:checked').val(),
        'size': $('#product-cart-form input[name="size"]:checked').val(),
        'user_id': $(this).data('user'),
        'product_id': $(this).data('product')
      }
      var That = $(this);
      $.ajax({
        method: 'post',
        url: ActionRoute,
        data: Data,
        success: function(response){
          That.html('<i class="flaticon-bag"></i> في السلة '+Data.qty);
          //Update navbar cart icon
          var CurrentValue = parseInt($('.shopping-card').find('span').html());
          $('.shopping-card').find('span').html(CurrentValue + parseInt(Data.qty));
      },
        error: function(response, textStatus, errorThrown){
          console.log(response);
          That.html('<i class="flaticon-bag"></i> اضف الى السلة');
          ShowNoto('notification-danger' , response.responseJSON , 'Error');
        }
      });
    });
    //Disable Arrows on Qty Filed
    $('.cart-qty-input').keydown(function(e){
      if (e.which === 38 || e.which === 40) {
          e.preventDefault();
      }
    });
    //Update Cart as the User Done Typing
    $('.cart-qty-input').change(function(e){
      var ActionRoute = $(this).data('target');
     var TheItem = $(this);
     var ItemValue = $(this).val();
     $.ajax({
         'method':'post',
         'url' : ActionRoute,
         'data' : {
             'qty' : ItemValue,
         },
         success: function(response){
             $("#update-cart-btn").removeClass('d-none');
         },
         error: function (response){
            console.log(response);
             ShowNoto('notification-danger' , response.responseText , 'Error');
         }
     });
    });
    $('#cart-coupon').click(function(e){
      e.preventDefault();
      $(this).html('<i class="fas fa-spinner fa-spin"></i>');
      var ActionRoute = $(this).data('target');
      var Data = $(this).parent('form').serialize();
      var TheButton = $(this);
      //Do Ajax Call
      $.ajax({
        method : 'POST',
        url : ActionRoute,
        data : Data,
        success: function(response){
          TheButton.html('<i class="fas fa-check text-success"></i>');
          location.reload(true);
        },
        error: function(response){
          TheButton.html('ادخال');
          ShowNoto('notification-danger' , response.responseText , 'Error');
        }
      });
    });
    //Order Trace 
    $('#trace-order-form').click(function(e){
      e.preventDefault();
      var OrderId = $(this).closest('#order-id').val();
      console.log(OrderId);
    });
})(jQuery);

<?php
use Illuminate\Support\Facades\Route;
// Route::get('/','HomeController@getSoonPage')->name('soon');
Route::get('/','HomeController@getHomepage')->name('home');
Route::get('/about','PagesController@getAbout')->name('about');
//Static Pages
Route::get('privacy-policy' , 'PagesController@getPrivacyPolicy')->name('privacy.policy');
Route::get('return-policy' , 'PagesController@getReturnPolicy')->name('return.policy');
//Blog System
Route::prefix('blog')->group(function(){
  Route::get('/' , 'BlogController@getFrontendHome')->name('blog');
  Route::get('/{id}/{slug?}' , 'BlogController@getSingle')->name('blog.single');
});
Route::get('sitemap.xml' , 'SitemapController@getSitemap');
//Users System
Route::middleware('auth')->group(function () {
  //User Profile
  Route::get('profile' , 'AuthController@getProfile')->name('profile');
  Route::get('wishlist' , 'AuthController@getWishlist')->name('wishlist');
  Route::get('report' , 'AuthController@getReport')->name('profile.report');
  Route::get('kids' , 'AuthController@getKids')->name('profile.kids');
  Route::post('add-kids' , 'AuthController@AddNewKids')->name('profile.kids.add');
  Route::get('delete-kid/{id}' , 'AuthController@DeleteKid')->name('profile.kid.delete');
  Route::get('logout' , 'AuthController@logout')->name('logout');
  //Update Account Data
  Route::get('edit-profile' , 'AuthController@getEditProfile')->name('profile.edit');
  Route::post('edit-profile' , 'AuthController@postEditProfile')->name('profile.edit.post');
  Route::post('edit-password' , 'AuthController@postUpdatePassword')->name('profile.password.edit.post');
  //Account Approval
  Route::get('approve-account/{code}' , 'AuthController@getApproveAccount')->name('profile.approve');
});
//Cart
Route::get('cart' , 'CartController@getCart')->name('order.cart');
Route::post('delete-from-cart' , 'CartController@deleteFromCart')->name('cart.delete');
Route::get('delete-coupon/{id}/{couponid}' , 'CartController@deleteCuopon')->name('cart.coupon.delete');
//Checkout
Route::get('checkout' , 'OrdersController@getCheckout')->name('orders.checkout');
Route::post('checkout' , 'OrdersController@postCheckout')->name('orders.checkout.post');
Route::get('thank-you/{id}' , 'OrdersController@getOrderComplete')->name('order.complete');
Route::get('order-success' , 'OrdersController@getOrderSuccess')->name('order.thankyou');
Route::post('add-review' , 'ReviewController@postReview')->name('review.post');
Route::middleware('guest')->group(function () {
  Route::get('login' , 'AuthController@getLogin')->name('login.get');
  Route::post('login' , 'AuthController@postLogin')->name('login.post');
  Route::get('signup' , 'AuthController@getSignup')->name('signup.get');
  Route::post('signup' , 'AuthController@postSignup')->name('signup.post');
  Route::get('reset-password' , 'AuthController@getResetPage')->name('reset.get');
  Route::post('reset-password' , 'AuthController@postResetPage')->name('reset.post');
  Route::get('choose-password/{email}/{code}' , 'AuthController@getChoosePasswordPage')->name('reset.choosePassword.get');
  Route::post('choose-password/' , 'AuthController@postChoosePasswordPage')->name('reset.choosePassword.post');
  //Social Signup System
  Route::get('social-login/{provider}' , 'AuthController@redirectToProvider')->name('login.social');
  Route::get('login/{driver}/callback' , 'AuthController@handleProviderCallback')->name('login.social.callback');
});
Route::get('trace-order' , 'OrdersController@getTrace')->name('order.trace');
//Products List
Route::get('shop' , 'ProductsController@getAll')->name('shop');
Route::get('category/{category}' , 'ProductsController@getCategoryAll')->name('shop.category');
Route::get('size/{size}' , 'ProductsController@getSizeAll')->name('shop.size');
Route::get('season/{season}' , 'ProductsController@getSeasonAll')->name('shop.season');
Route::get('type/{type}' , 'ProductsController@getTypeAll')->name('shop.type');
Route::get('search' , 'ProductsController@searchProducts')->name('shop.search');
Route::get('product/{slug}/{id}' , 'ProductsController@getSingle')->name('product');
//Contact Us
Route::get('contact' , 'PagesController@getContact')->name('contact');
Route::post('contact' , 'PagesController@postContact')->name('contact.post');
//Admin Only Routes
Route::group(['prefix' => 'admin' , 'middleware' => 'isAdmin'] , function () {
    Route::get('/' , 'AdminController@getHome')->name('admin.home');
    //System Settings
    Route::prefix('system')->group(function(){
      Route::get('/' , 'SystemSettingsController@getHome')->name('admin.system.home');
      Route::get('/edit/{id}' , 'SystemSettingsController@getEdit')->name('admin.system.getEdit');
      Route::post('/edit/{id}' , 'SystemSettingsController@postEdit')->name('admin.system.postEdit');
    });
    //Categories
    Route::prefix('categories')->group(function(){
      Route::get('/' , 'CategoriesController@getHome')->name('admin.categories.home');
      Route::get('/new' , 'CategoriesController@getNew')->name('admin.categories.getNew');
      Route::post('/new' , 'CategoriesController@postNew')->name('admin.categories.postNew');
      Route::get('/edit/{id}' , 'CategoriesController@getEdit')->name('admin.categories.getEdit');
      Route::post('/edit/{id}' , 'CategoriesController@postEdit')->name('admin.categories.postEdit');
    });
    //Products System
    Route::prefix('products')->group(function(){
      Route::get('/' , 'ProductsController@getHome')->name('admin.products.home');
      Route::get('/new' , 'ProductsController@getNew')->name('admin.products.getNew');
      Route::post('/new' , 'ProductsController@postNew')->name('admin.products.postNew');
      Route::get('/edit/{id}' , 'ProductsController@getEdit')->name('admin.products.getEdit');
      Route::post('/edit/{id}' , 'ProductsController@postEdit')->name('admin.products.postEdit');
      Route::get('/variations/{id}' , 'ProductsController@getVariations')->name('admin.products.variations');
      Route::post('/variations/{id}' , 'ProductsController@postVariations')->name('admin.products.postVariations');
      Route::get('/variations/delete/{id}' , 'ProductsController@deleteVariations')->name('admin.products.variation.delete');
    });
    //Users System
    Route::prefix('users')->group(function(){
      Route::get('/' , 'AuthController@getHome')->name('admin.users.home');
    });
    //Discount System
    Route::prefix('discount')->group(function(){
      Route::get('/' , 'DiscountController@getHome')->name('admin.discount.home');
      Route::get('/new' , 'DiscountController@getNew')->name('admin.discount.getNew');
      Route::post('/new' , 'DiscountController@postNew')->name('admin.discount.postNew');
      Route::get('/edit/{id}' , 'DiscountController@getEdit')->name('admin.discount.getEdit');
      Route::post('/edit/{id}' , 'DiscountController@postEdit')->name('admin.discount.postEdit');
    });
    //Coupouns System
    Route::prefix('coupoun')->group(function(){
      Route::get('/' , 'CoupounsController@getHome')->name('admin.coupoun.home');
      Route::get('/new' , 'CoupounsController@getNew')->name('admin.coupoun.getNew');
      Route::post('/new' , 'CoupounsController@postNew')->name('admin.coupoun.postNew');
      Route::get('/edit/{id}' , 'CoupounsController@getEdit')->name('admin.coupoun.getEdit');
      Route::post('/edit/{id}' , 'CoupounsController@postEdit')->name('admin.coupoun.postEdit');
    });
    //Orders System
    Route::prefix('orders')->group(function(){
      Route::get('/' , 'OrdersController@getHome')->name('admin.orders.home');
      Route::get('/single/{id}' , 'OrdersController@getSingleOrder')->name('admin.orders.single');
      Route::post('/update-status/{id}' , 'OrdersController@updateOrderStatus')->name('admin.orders.updateStatus');
      Route::get('/delete-order/{id}' , 'OrdersController@delete')->name('admin.orders.delete');
    });
    //Discount System
    Route::prefix('blog')->group(function(){
      Route::get('/' , 'BlogController@getHome')->name('admin.blog.home');
      Route::get('/new' , 'BlogController@getNew')->name('admin.blog.getNew');
      Route::post('/new' , 'BlogController@postNew')->name('admin.blog.postNew');
      Route::get('/edit/{id}' , 'BlogController@getEdit')->name('admin.blog.getEdit');
      Route::post('/edit/{id}' , 'BlogController@postEdit')->name('admin.blog.postEdit');
    });
});


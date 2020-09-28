<?php
use Illuminate\Support\Facades\Route;
Route::get('/','HomeController@getHomepage')->name('home');
//Users System
Route::middleware('auth')->group(function () {
  Route::get('profile' , 'AuthController@getProfile')->name('profile');
  Route::get('wishlist' , 'AuthController@getWishlist')->name('wishlist');
  Route::get('report' , 'AuthController@getReport')->name('profile.report');
  Route::get('logout' , 'AuthController@logout')->name('logout');
  //Update Account Data
  Route::get('edit-profile' , 'AuthController@getEditProfile')->name('profile.edit');
  Route::post('edit-profile' , 'AuthController@postEditProfile')->name('profile.edit.post');
  Route::post('edit-password' , 'AuthController@postUpdatePassword')->name('profile.password.edit.post');
  //Account Approval
  Route::get('approve-account/{code}' , 'AuthController@getApproveAccount')->name('profile.approve');
});
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
Route::get('product/{id}/{slug}' , 'ProductsController@getSingle')->name('product');
//Pages Routes
Route::get('contact' , 'PagesController@getContact')->name('contact');
Route::post('contact' , 'PagesController@postContact')->name('contact.post');
Route::get('checkout' , 'PagesController@getCheckout')->name('checkout');
Route::get('category' , 'PagesController@getCategoryPage')->name('category');
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
      Route::get('/' , 'UsersController@getHome')->name('admin.users.home');
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
    //Shipping Costs System
    Route::prefix('shipping-costs')->group(function(){
      Route::get('/' , 'ShippingCostsController@getHome')->name('admin.shippingCosts.home');
      Route::get('/new' , 'ShippingCostsController@getNew')->name('admin.shippingCosts.getNew');
      Route::post('/new' , 'ShippingCostsController@postNew')->name('admin.shippingCosts.postNew');
      Route::get('/edit/{id}' , 'ShippingCostsController@getEdit')->name('admin.shippingCosts.getEdit');
      Route::post('/edit/{id}' , 'ShippingCostsController@postEdit')->name('admin.shippingCosts.postEdit');
    });
      //Orders System
      Route::prefix('orders')->group(function(){
        Route::get('/' , 'OrdersController@getHome')->name('admin.orders.home');
        Route::get('/single/{id}' , 'OrdersController@getSingleOrder')->name('admin.orders.single');
        Route::post('/update-status/{id}' , 'OrdersController@updateOrderStatus')->name('admin.orders.updateStatus');
        Route::get('/new' , 'ProductsController@getNew')->name('admin.products.getNew');
        Route::post('/new' , 'ProductsController@postNew')->name('admin.products.postNew');
        Route::get('/edit/{id}' , 'ProductsController@getEdit')->name('admin.products.getEdit');
        Route::post('/edit/{id}' , 'ProductsController@postEdit')->name('admin.products.postEdit');
        Route::get('/localize/{id}' , 'ProductsController@getLocalize')->name('admin.products.getLocalize');
      });
  });

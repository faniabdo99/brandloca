<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//Non Admin API Routes
//Users System
Route::post('resend-confirmation-mail' , 'AuthController@resendConfirmationMail')->name('auth.resendConfirmation');
Route::post('account-report-form' , 'AuthController@postReport')->name('profile.report.post');
//Wishlist
Route::post('add-to-wishlist' , 'FavouriteController@ToggleFavourite')->name('favourite.toggle');
//Products
Route::post('product/filter' , 'ProductsController@ApplyFilters')->name('shop.filter');
//Cart
Route::post('check-color/{id}' , 'ProductsController@checkColors')->name('cart.checkColors');
Route::post('add-to-cart' , 'CartController@addToCart')->name('cart.add');
Route::post('update-cart/{item}/{user}' , 'CartController@updateCart')->name('cart.update');
Route::post('apply-coupon' , 'CartController@ApplyCoupon')->name('cart.coupon');
//Trace Order
Route::post('trace-order' , 'OrdersController@postTrace')->name('order.trace.post');










//*********Admin API Routes
//Categories
Route::post('delete-category' , 'CategoriesController@delete')->name('admin.category.delete');
Route::post('/category/localize' , 'CategoriesController@postLocalize')->name('admin.categories.postLocalize');
//Products
Route::post('delete-product' , 'ProductsController@delete')->name('admin.product.delete');
Route::post('upload-images' , 'ProductsController@uploadGalleryImages')->name('admin.product.uploadGalleryImages');
Route::post('/product/localize' , 'ProductsController@postLocalize')->name('admin.products.postLocalize');
//Users
Route::post('delete-user' , 'AuthController@delete')->name('admin.user.delete');
//Discount
Route::post('delete-discount' , 'DiscountController@delete')->name('admin.discount.delete');
Route::post('activate-deactivate-user' , 'AuthController@ToggleActive')->name('admin.user.toggleActive');
//Coupon
Route::post('delete-coupon' , 'CoupounsController@delete')->name('admin.coupoun.delete');
//Blog
Route::post('delete-article' , 'BlogController@delete')->name('admin.blog.delete');
//Shipping Costs
Route::post('delete-shipping-cost' , 'ShippingCostsController@delete')->name('admin.shippingCosts.delete');
Route::post('calculate-shipping-cost' , 'ShippingCostsController@calculateShippingCost')->name('admin.shippingCosts.calculate');
//*********non-Admin API Routes
Route::post('send-activate-link' , 'AuthController@sendActivateEmail')->name('user.sendActivateLink');
Route::post('ask-question-about-product' , 'ProductsController@askQuestion')->name('product.askQuestion');
Route::post('like-item' , 'FavouriteController@ToggleFavourite')->name('favourite.toggle');

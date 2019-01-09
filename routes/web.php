<?php
use Spatie\Analytics\Period;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//tests

Route::get('/pdf', 'PdfController@index');

//shop && Product

Route::get('/shop', ['uses' => 'ShopController@index', 'as' => 'index.shop']);

Route::get('/shop/product/{id}', ['uses' => 'ShopController@show', 'as' => 'show.shop']);

Route::get('/profile/{id}', ['uses' => 'ProfileController@index', 'as' => 'index.profile'])->middleware('auth');
//Cart

Route::post('/cart/add', 'CartController@store')->name('cart.store');

Route::get('/cart', ['uses' => 'CartController@index', 'as' => 'index.cart']);

Route::get('/cart/update', ['uses' => 'CartController@update', 'as' => 'update.cart']);

Route::post('/cart/destroy', ['uses' => 'CartController@destroy', 'as' => 'destroy.cart']);



Route::get('/thankyou', function() {
  return view('shop.thankyou');
})->name('landingpage.thankyou');

//Wishlist

Route::post('/wishlist/add', ['uses' => 'WishController@store', 'as' => 'store.wishlist']);

Route::post('/wishlist/destroy', ['uses' => 'WishController@destroy', 'as' => 'destroy.wishlist']);

//check coupons

Route::post('/coupon', 'CouponController@check')->name('check.coupon');

Route::get('/coupon/forget', 'CouponController@forget')->name('forget.coupon');

//landing page

Route::get('/', ['uses' => 'LandingController@index', 'as' => 'index.landing']);

//about

Route::get('/about', function () {
    return view('shop.about');
})->name('about.shop');

//contact

Route::get('/contact', function () {
    return view('shop.contact');
})->name('contact.shop');


//method

Route::get('/method', ['uses' => 'CheckoutController@method', 'as' => 'method.checkout'])->middleware('auth');

Route::get('/download', ['uses' => 'CheckoutController@download', 'as' => 'download.checkout'])->middleware('auth');

Route::post('/checkout/store/{method}', ['uses' => 'CheckoutController@store', 'as' => 'checkout.store'])->middleware('auth');

Route::get('/checkout', ['uses' => 'CheckoutController@index', 'as' => 'checkout.cart'])->middleware('auth');


//users Route

Auth::routes();


//admin routes
Route::prefix('admin')->group(function(){

    Route::middleware(['auth:admin'])->group(function () {

    Route::get('/', function () {
        return view('adminpanel.index');
    })->name('admin.panel');

    //Posts

    Route::get('/post/create', ['uses' => 'ProductController@create', 'as' => 'create.product']);

    Route::post('/post/create', ['uses' => 'ProductController@store', 'as' => 'store.product']);

    Route::get('/post/manage', ['uses' => 'ProductController@index', 'as' => 'index.product']);

    Route::get('/post/edit/{id}', ['uses' => 'ProductController@edit', 'as' => 'edit.product']);

    Route::post('/post/update/{id}', ['uses' => 'ProductController@update', 'as' => 'update.product']);

    Route::delete('/post/delete/', ['uses' => 'ProductController@destroy', 'as' => 'delete.product']);

    Route::get('/category', ['uses' => 'CategoryController@create', 'as' => 'create.category']);

    Route::get('/category/edit/{id}', ['uses' => 'CategoryController@edit', 'as' => 'edit.category']);

    Route::get('/category/manage', ['uses' => 'CategoryController@index', 'as' => 'index.category']);

    Route::post('/category/update/{id}', ['uses' => 'CategoryController@update', 'as' => 'update.category']);

    Route::post('/category/create', ['uses' => 'CategoryController@store', 'as' => 'store.cateogry']);

    Route::get('/category/delete/', ['uses' => 'CategoryController@destroy', 'as' => 'delete.category']);

    Route::get('/delete/multipleimages', ['uses' => 'MultipleimageController@destroy', 'as' => 'delete.image']);

    //orders

    Route::get('/orders', ['uses' => 'OrdersController@index', 'as' => 'index.order']);

    Route::get('/orders/{status}', ['uses' => 'OrdersController@status', 'as' => 'status.order']);

    Route::post('/orders/update/{order_id}/{updates}/{status}', ['uses' => 'OrdersController@update', 'as' => 'update.order']);

    Route::get('/orders/refund/{resource}', ['uses' => 'OrdersController@refund', 'as' => 'refund.order']);

    //sliders

    Route::get('/slider/create', ['uses' => 'SliderController@create', 'as' => 'create.slider']);

    Route::post('/slider/create', ['uses' => 'SliderController@store', 'as' => 'store.slider']);

    Route::get('/slider/manage', ['uses' => 'SliderController@index', 'as' => 'index.slider']);

    Route::get('/slider/delete', ['uses' => 'SliderController@destroy', 'as' => 'delete.image']);

    //Admins

    Route::get('/admin/create', ['uses' => 'AdminController@create', 'as' => 'create.admin']);

    Route::post('/admin/create', ['uses' => 'AdminController@store', 'as' => 'store.admin']);

    Route::get('/admin/manage', ['uses' => 'AdminController@index', 'as' => 'index.admin']);

    Route::get('/admin/edit/{id}', ['uses' => 'ProductController@edit', 'as' => 'edit.admin']);

    Route::post('/admin/update/{id}', ['uses' => 'ProductController@update', 'as' => 'update.admin']);

    //coupons
    Route::get('/coupon/create', ['uses' => 'CouponController@create', 'as' => 'create.coupon']);

    Route::post('/coupon/create', ['uses' => 'CouponController@store', 'as' => 'store.coupon']);

    Route::get('/coupon/manage', ['uses' => 'CouponController@index', 'as' => 'index.coupon']);

    Route::get('/coupon/destroy/{id}', ['uses' => 'CouponController@destroy', 'as' => 'destroy.coupon']);


  });


      //admin login
      Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

      Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

      Route::POST('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

});

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('/destroy', function() {
  Cart::instance('default')->destroy();
});

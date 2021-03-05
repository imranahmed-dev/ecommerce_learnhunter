<?php

use Illuminate\Support\Facades\Route;

//Clear Cache
Route::get('clear', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('storage:link');
    return 'Cache Cleared Successfully'; //Return anything
});

/////////////////////////Frontend routes////////////////////////////////
Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/', 'FrontendController@index');
    Route::get('/checkout', 'FrontendController@checkout')->name('checkout');
    Route::get('/cart', 'FrontendController@cart')->name('cart');
    Route::get('/user/login', 'FrontendController@userLogin')->name('user.login');
    Route::get('/user/register', 'FrontendController@userRegister')->name('user.register');
    Route::post('/user/store', 'FrontendController@userStore')->name('user.store');
    Route::get('/product/details/{slug}', 'FrontendController@productDetails')->name('product.details');
    Route::post('/newslater/store', 'FrontendController@newslaterStore')->name('newslater.store');
});


//Wishlist
Route::get('/wishlist/store/{id}', 'Frontend\WishlistController@store');
Route::get('/wishlist/count', 'Frontend\WishlistController@wishlistCount');

//Cart
Route::get('/cart/store/{id}', 'Frontend\CartController@store');
Route::get('/cart/count', 'Frontend\CartController@cartCount');
Route::get('/cart/total', 'Frontend\CartController@cartTotal');
Route::post('/apply/coupon', 'Frontend\CartController@applyCoupon')->name('apply.coupon');
Route::get('/coupon/remove', 'Frontend\CartController@couponRemove')->name('coupon.remove');




/*User dashboard*/
Route::group(['prefix' => '/customer', 'namespace' => 'Frontend', 'middleware' => ['auth', 'user']], function () {

    //User profile
    Route::get('/dashboard', 'DashboardController@user_dashboard')->name('user.dashboard');
    Route::get('/profile', 'DashboardController@user_profile')->name('user.profile');
    Route::get('edit/profile', 'DashboardController@user_edit_profile')->name('user.edit.profile');
    Route::post('update/profile/{id}', 'DashboardController@user_update_profile')->name('user.update.profile');
    Route::get('/change/password', 'DashboardController@user_change_password')->name('user.change.password');
    Route::post('/update/password', 'DashboardController@user_update_password')->name('user.update.password');

    //Orders
    Route::get('/orders', 'DashboardController@orders')->name('user.orders');
    Route::get('/orders/details/{id}', 'DashboardController@order_details')->name('user.order.details');
});

//Auth route
Auth::routes();

//Social Login
Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');

Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');



/////////////////////////Default routes////////////////////////////////
//Get Data ajax
Route::group(['namespace' => 'DefaultController'], function () {

    Route::get('/get/subcategory/{id}', 'DefaultController@get_subcategory')->name('get.subcategory');
    Route::get('/get/division/{id}', 'DefaultController@get_district')->name('get.district');
});

/////////////////////////Backend routes////////////////////////////////
Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', 'Backend\DashboardController@admin_dashboard')->name('home');

    //Admin
    Route::group(['as' => 'admin.', 'prefix' => '/admin', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'AdminController@index')->name('index');
        Route::get('/create', 'AdminController@create')->name('create');
        Route::post('/store', 'AdminController@store')->name('store');
        Route::get('/edit/{id}', 'AdminController@edit')->name('edit');
        Route::post('/update/{id}', 'AdminController@update')->name('update');
        Route::get('/destroy/{id}', 'AdminController@destroy')->name('destroy');
    });

    //Admin Profile
    Route::group(['as' => 'admin.profile.', 'prefix' => '/admin/profile', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'ProfileController@index')->name('index');
        Route::get('/edit', 'ProfileController@edit')->name('edit');
        Route::post('/update', 'ProfileController@update')->name('update');
        Route::get('/edit/password', 'ProfileController@editPassword')->name('ep');
        Route::post('/update/password', 'ProfileController@updatePassword')->name('up');
    });

    //Division
    Route::group(['as' => 'division.', 'prefix' => '/division', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'DivisionController@index')->name('index');
        Route::get('/create', 'DivisionController@create')->name('create');
        Route::post('/store', 'DivisionController@store')->name('store');
        Route::get('/edit/{id}', 'DivisionController@edit')->name('edit');
        Route::post('/update/{id}', 'DivisionController@update')->name('update');
        Route::get('/destroy/{id}', 'DivisionController@destroy')->name('destroy');
    });

    //District
    Route::group(['as' => 'district.', 'prefix' => '/district', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'DistrictController@index')->name('index');
        Route::get('/create', 'DistrictController@create')->name('create');
        Route::post('/store', 'DistrictController@store')->name('store');
        Route::get('/edit/{id}', 'DistrictController@edit')->name('edit');
        Route::post('/update/{id}', 'DistrictController@update')->name('update');
        Route::get('/destroy/{id}', 'DistrictController@destroy')->name('destroy');
    });

    //Category
    Route::group(['as' => 'category.', 'prefix' => '/category', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'CategoryController@index')->name('index');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::post('/store', 'CategoryController@store')->name('store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('update');
        Route::get('/destroy/{id}', 'CategoryController@destroy')->name('destroy');
    });

    //Subcategory
    Route::group(['as' => 'subcategory.', 'prefix' => '/subcategory', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'SubcategoryController@index')->name('index');
        Route::get('/create', 'SubcategoryController@create')->name('create');
        Route::post('/store', 'SubcategoryController@store')->name('store');
        Route::get('/edit/{id}', 'SubcategoryController@edit')->name('edit');
        Route::post('/update/{id}', 'SubcategoryController@update')->name('update');
        Route::get('/destroy/{id}', 'SubcategoryController@destroy')->name('destroy');
    });

    //Brand
    Route::group(['as' => 'brand.', 'prefix' => '/brand', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'BrandController@index')->name('index');
        Route::get('/create', 'BrandController@create')->name('create');
        Route::post('/store', 'BrandController@store')->name('store');
        Route::get('/edit/{id}', 'BrandController@edit')->name('edit');
        Route::post('/update/{id}', 'BrandController@update')->name('update');
        Route::get('/destroy/{id}', 'BrandController@destroy')->name('destroy');
    });

    //Coupon
    Route::group(['as' => 'coupon.', 'prefix' => '/coupon', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'CouponController@index')->name('index');
        Route::get('/create', 'CouponController@create')->name('create');
        Route::post('/store', 'CouponController@store')->name('store');
        Route::get('/edit/{id}', 'CouponController@edit')->name('edit');
        Route::post('/update/{id}', 'CouponController@update')->name('update');
        Route::get('/destroy/{id}', 'CouponController@destroy')->name('destroy');
    });

    //Newslater
    Route::group(['as' => 'newslater.', 'prefix' => '/newslater', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'NewslaterController@index')->name('index');
        Route::get('/destroy/{id}', 'NewslaterController@destroy')->name('destroy');
    });

    //Color
    Route::group(['as' => 'color.', 'prefix' => '/color', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'ColorController@index')->name('index');
        Route::get('/create', 'ColorController@create')->name('create');
        Route::post('/store', 'ColorController@store')->name('store');
        Route::get('/edit/{id}', 'ColorController@edit')->name('edit');
        Route::post('/update/{id}', 'ColorController@update')->name('update');
        Route::get('/destroy/{id}', 'ColorController@destroy')->name('destroy');
    });

    //Size
    Route::group(['as' => 'size.', 'prefix' => '/size', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'SizeController@index')->name('index');
        Route::get('/create', 'SizeController@create')->name('create');
        Route::post('/store', 'SizeController@store')->name('store');
        Route::get('/edit/{id}', 'SizeController@edit')->name('edit');
        Route::post('/update/{id}', 'SizeController@update')->name('update');
        Route::get('/destroy/{id}', 'SizeController@destroy')->name('destroy');
    });

    //Product
    Route::group(['as' => 'product.', 'prefix' => '/product', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'ProductController@index')->name('index');
        Route::get('/create', 'ProductController@create')->name('create');
        Route::post('/store', 'ProductController@store')->name('store');
        Route::get('/show/{id}', 'ProductController@show')->name('show');
        Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
        Route::post('/update/{id}', 'ProductController@update')->name('update');

        Route::get('/trash/{id}', 'ProductController@trash')->name('trash');
        Route::get('/trashed/list', 'ProductController@trash_list')->name('trash.list');
        Route::get('/restore/{id}', 'ProductController@restore')->name('restore');
        Route::post('/status/{id}', 'ProductController@status')->name('status');
        Route::get('/destroy/{id}', 'ProductController@destroy')->name('destroy');
    });

    //Blog Category
    Route::group(['as' => 'blogcategory.', 'prefix' => '/blog/category', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'BlogCategoryController@index')->name('index');
        Route::get('/create', 'BlogCategoryController@create')->name('create');
        Route::post('/store', 'BlogCategoryController@store')->name('store');
        Route::get('/edit/{id}', 'BlogCategoryController@edit')->name('edit');
        Route::post('/update/{id}', 'BlogCategoryController@update')->name('update');
        Route::get('/destroy/{id}', 'BlogCategoryController@destroy')->name('destroy');
    });

    //Blog
    Route::group(['as' => 'blog.', 'prefix' => '/blog', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'BlogController@index')->name('index');
        Route::get('/create', 'BlogController@create')->name('create');
        Route::post('/store', 'BlogController@store')->name('store');
        Route::get('/show/{id}', 'BlogController@show')->name('show');
        Route::get('/edit/{id}', 'BlogController@edit')->name('edit');
        Route::post('/update/{id}', 'BlogController@update')->name('update');
        Route::get('/destroy/{id}', 'BlogController@destroy')->name('destroy');
        Route::post('/status/{id}', 'BlogController@blog_status')->name('status');
    });

    //Order
    Route::group(['as' => 'order.', 'prefix' => '/order', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'OrderController@index')->name('index');
        Route::get('/create', 'OrderController@create')->name('create');
        Route::post('/store', 'OrderController@store')->name('store');
        Route::get('/edit/{id}', 'OrderController@edit')->name('edit');
        Route::post('/update/{id}', 'OrderController@update')->name('update');
        Route::get('/destroy/{id}', 'OrderController@destroy')->name('destroy');
    });
});

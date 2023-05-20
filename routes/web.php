<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BECategoryCotroller;
use App\Http\Controllers\BEBrandsController;
use App\Http\Controllers\BEProductController;
use App\Http\Controllers\BEProductCommentController;
use App\Http\Controllers\BEProductAttributeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BEUserController;
use App\Http\Livewire\Admin\RoleComponent;
use App\Http\Livewire\Admin\PermissionComponent;
use App\Http\Controllers\PageController;
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

// ------------ Site -------------//
// Pages

Route::get('/', [MainController::class, 'index', 'contact']);
Route::get('/contact', [MainController::class, 'contact']);
Route::get('/about', [MainController::class, 'about']);
//Route::get('/search', [MainController::class, 'search']);
Route::get('/contact', [MainController::class, 'contact']);
Route::post('/send-contact', [MainController::class, 'sendContact']);

// News
Route::get('/news', [MainController::class, 'news']);
Route::get('/single-news/{slug}', [NewsController::class, 'single_news'])->name('single-news');
Route::get('/news-category/{slug}', [CategoryController::class, 'category'])->name('category');
//Route::get('/checkout', [MainController::class, 'checkout']);
    //Route::get('/account-profile', [MainController::class, 'account_profile']);
// Products
    Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
    Route::get('/single-product/{slug}', [ProductController::class, 'single_product'])->name('single-product');
    Route::post('/shop/filter', [ProductController::class, 'filter'])->name('productsFilter');
    Route::post('/addProductComment', [ProductController::class, 'addComment'])->name('productComment');
// Cart
Route::get('/add-cart/{id}', [CartController::class, 'add_cart'])->name('addCart');
Route::get('/show-cart', [CartController::class, 'show_cart'])->name('showCart');
Route::get('/update-cart', [CartController::class, 'update_cart'])->name('updateCart');
Route::get('delete-cart', [CartController::class, 'delete_cart'])->name('deleteCart');
// Order
Route::post('apply', [CartController::class, 'apply_coupon'])->name('apply');
Route::post('apply-payment', [CartController::class, 'apply_payment'])->name('applyPayment');
Route::get('order', [CartController::class, 'order'])->name('order');
Route::post('save-order', [CartController::class, 'save_order'])->name('saveOrder');
Route::get('store-vnpay', [CartController::class, 'store_vnpay'])->name('storeVnpay');


// Search
Route::get('/search', [ProductController::class, 'search'])->name('search');
//commmetntt
    // Route::get('/single-product/{id}', 'HomeController@index');
    // Route::post('home/comment','HomeController@storecomment');
// Auth
Route::middleware('guest')->group(function(){
    route::get('/login', [UserController::class, 'login'])->name('login');
    route::post('/login', [UserController::class, 'login_action'])->name('login.action');

    route::get('/register', [UserController::class, 'register'])->name('register');
    route::post('/register', [UserController::class, 'register_action'])->name('register.action');

    Route::get('forget-password', [UserController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [UserController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [UserController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [UserController::class, 'submitResetPasswordForm'])->name('reset.password.post');
});
Route::middleware('auth')->group(function(){
    route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profileEdit/{id}', [UserController::class, 'profile_edit'])->name('profile.edit');
    Route::put('/profileUpdate/{id}', [UserController::class, 'profile_update'])->name('profile.update');
    Route::post('/passUpdate', [UserController::class, 'pass_update'])->name('pass.update');
    route::get('/logout', [UserController::class, 'logout'])->name('logout');
    route::get('/order_details/{id}', [UserController::class, 'order_details'])->name('orderDetails');
});

// ------------ Admin ------------//

Route::prefix('admin')->middleware(['auth','role:Admin|Super-Admin'])->group(function (){
// Dashboard
    Route::get('/', [AdminController::class, 'dashboard']);
    Route::middleware(['role_or_permission:News Full|news-list|news-category|news-comment'])->group(function(){
        Route::middleware('can:news-list')->group(function(){
            // News
            Route::get('/news', [NewsController::class, 'news_list']);
            Route::get('/news/add', [NewsController::class, 'add']);
            Route::post('/news/add', [NewsController::class, 'add_']);
            Route::get('/news/hot/{id}', [NewsController::class, 'hot']);
            Route::get('/news/appear/{id}', [NewsController::class, 'appear']);
            Route::get('/news/update/{id}', [NewsController::class, 'update']);
            Route::post('/news/update/{id}', [NewsController::class, 'update_']);
            Route::get('/news/delete/{id}', [NewsController::class, 'delete']);
        // News filter
            Route::post('/news/filter',[NewsController::class, 'filter']);
        });
        Route::middleware('can:news-category')->group(function(){
        // News categories
            Route::get('/news/categories', [CategoryController::class, 'news_cat']);
            Route::post('/category/add', [CategoryController::class, 'add_cat']);
            Route::post('/category/delete', [CategoryController::class, 'delete_cat']);
            Route::get('/category/update/{id}', [CategoryController::class, 'update_cat']);
            Route::post('/category/update', [CategoryController::class, 'update_cat_']);
        });
        // News comments
        Route::middleware('can:news-comment')->group(function(){
            Route::get('/news/comment', [NewsController::class,'comment'])->name('admin.news.comment');
            Route::post('/news/changeAppear',[NewsController::class,'change'])->name('admin.newsComment.changeAppear');
            Route::post('/newsComment/destroy',[NewsController::class,'destroy'])->name('admin.newsComment.destroy');
        });

    });
    // Orders
    Route::middleware(['can:order'])->group(function(){
        Route::get('/orders', [OrdersController::class, 'index']);
        Route::get('/order/detail/{id}', [OrdersController::class, 'detail']);
        Route::post('/order/filter', [OrdersController::class, 'filter']);
        Route::post('/order/update-status/{id}', [OrdersController::class, 'update_status']);
    });
    Route::middleware(['role:Super-Admin'])->group(function(){
    // Pages
        Route::get('/pages', [PageController::class, 'index']);
        Route::get('/page/update/{id}', [PageController::class, 'update_page']);
        Route::post('/page/update/{id}', [PageController::class, 'update_page_']);
        Route::post('/update_option', [PageController::class, 'update_option']);
        // Options Page
        Route::get('/option', [PageController::class, 'option']);
        Route::post('/option', [PageController::class, 'update_option']);
        // User
        Route::get('/user',[BEUserController::class, 'index'])->name('admin.user');
        Route::get('user/{id}/permission', [BEUserController::class,'permission'])->name('user.permission');
        Route::post('user/permission', [BEUserController::class,'permissionStore'])->name('user.permission.store');
        Route::post('/user',[BEUserController::class, 'destroy'])->name('admin.user.destroy');

        Route::get('/role', RoleComponent::class)->name('admin.user.role');
        Route::get('/permission', PermissionComponent::class)->name('admin.user.permission');
    });
    //Impersonate
    Route::get('impersonate/{id}',[BEUserController::class,'impersonate'])->name('impersonate');
    Route::get('impersonate_leave',[BEUserController::class,'impersonate_leave'])->name('impersonate_leave');
    // Contact Email
    Route::middleware(['can:form-contact'])->group(function(){
        Route::get('/contact', [AdminController::class, 'contact']);
        Route::get('/contact/delete/{id}', [AdminController::class, 'contact_delete']);
    });
    // Coupon
    Route::middleware(['can:coupon'])->group(function(){
        Route::get('/coupon', [AdminController::class, 'coupon']);
        Route::get('/coupon/add', [AdminController::class, 'add_coupon']);
        Route::post('/coupon/add', [AdminController::class, 'add_coupon_']);
        Route::get('/coupon/update/{id}', [AdminController::class, 'update_coupon']);
        Route::post('/coupon/update/{id}', [AdminController::class, 'update_coupon_']);
        Route::get('/coupon/delete/{id}', [AdminController::class, 'delete_coupon']);
    });
    Route::middleware(['role_or_permission:Product-Full|product-list|product-category|product-brand|product-comment'])->group(function(){
    // Products
        Route::get('products', [BEProductController::class, 'index'])->name('admin.products');
        Route::get('product/add', [BEProductController::class, 'add']);
        Route::post('product/save', [BEProductController::class, 'save']);
        Route::post('product/delete', [BEProductController::class, 'delete']);
        Route::get('product/update/{id}', [BEProductController::class, 'update']);
        Route::post('product/update/save/{id}', [BEProductController::class, 'update_save']);
        Route::get('product/changeStatus/{id}', [BEProductController::class, 'change_status']);
        // Categories
        Route::get('product_categories', [BECategoryCotroller::class, 'index']);
        Route::post('product_category/save', [BECategoryCotroller::class, 'save']);
        Route::post('product_category/delete', [BECategoryCotroller::class, 'delete']);
        Route::get('product_category/update/{id}', [BECategoryCotroller::class, 'update_']);
        Route::post('product_category/update', [BECategoryCotroller::class, 'update']);
        Route::get('product_category/changeStatus/{id}', [BECategoryCotroller::class, 'change_status']);
        // Brands
        Route::get('brands', [BEBrandsController::class, 'index']);
        Route::post('brand/delete', [BEBrandsController::class, 'delete']);
        Route::post('brand/save', [BEBrandsController::class, 'save']);
        Route::get('brand/update/{id}', [BEBrandsController::class, 'update']);
        Route::post('brand/save/update', [BEBrandsController::class, 'save_update']);
        Route::get('brand/changeStatus/{id}', [BEBrandsController::class, 'change_status']);
        //Product attribute
//        Route::get('product/attributes/{id}', [BEProductAttributeController::class, 'product_attribute']);
//        Route::post('product/attributes/save', [BEProductAttributeController::class, 'save']);
        Route::get('/product/comments', [BEProductCommentController::class, 'index'])->name('product.comment');
        Route::post('/product/comments/changeAppear', [BEProductCommentController::class, 'changeAppear'])->name('product.comment.changeAppear');
        Route::post('/product/comments/delete', [BEProductCommentController::class, 'destroy'])->name('product.comment.destroy');
        // filter product
        Route::post('product/filter', [BEProductController::class, 'filter']);
    });

    Route::middleware(['can:media'])->group(function(){
    // Media
        Route::get('/media',[AdminController::class, 'media'])->name('admin.media');
        Route::post('/media/upload',[AdminController::class, 'upload'])->name('admin.media.upload');
        Route::get('/media/img_full/{id}',[AdminController::class, 'img_detail'])->name('admin.media.full');
        Route::post('/media/update/{id}',[AdminController::class, 'update_img'])->name('admin.media.update');
        Route::get('/media/delete/{id}',[AdminController::class, 'delete_img'])->name('admin.media.delete');
        Route::get('/media/popup',[AdminController::class, 'popup'])->name('admin.media.popup');
    });
});


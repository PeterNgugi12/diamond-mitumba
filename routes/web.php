<?php

use Illuminate\Support\Facades\Route;
use App\Http\livewire\HomeComponent;
use App\Http\livewire\ShopComponent;
use App\Http\livewire\CartComponent;
use App\Http\livewire\CheckoutComponent;
use App\Http\livewire\DetailsComponent;
use App\Http\livewire\CategoryComponent;
use App\Http\livewire\SearchComponent;
use App\Http\livewire\WishlistComponent;
use App\Http\livewire\ThankyouComponent;


use App\Http\livewire\user\UserDashboardComponent;
use App\Http\livewire\user\UserOrdersComponent;
use App\Http\livewire\user\UserOrderDetailsComponent;



use App\Http\livewire\admin\AdminDashboardComponent;
use App\Http\livewire\Admin\AdminCategoryComponent;
use App\Http\livewire\Admin\AdminAddCategoryComponent;
use App\Http\livewire\Admin\AdminEditCategoryComponent;
use App\Http\livewire\Admin\AdminProductComponent;
use App\Http\livewire\Admin\AdminAddProductComponent;
use App\Http\livewire\Admin\AdminEditProductComponent;
use App\Http\livewire\Admin\AdminHomeSliderComponent;
use App\Http\livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\livewire\Admin\AdminHomeCategoryComponent;
use App\Http\livewire\Admin\AdminSaleComponent;
use App\Http\livewire\Admin\AdminOrderComponent;
use App\Http\livewire\Admin\AdminOrderDetailsComponent;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', HomeComponent::class);
Route::get('/shop', ShopComponent::class);
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/wishlist', WishlistComponent::class)->name('product.wishlist');

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
 //   'verified'
//])->group(function () {
   // Route::get('/dashboard', function () {
    //    return view('dashboard');
   // })->name('dashboard');
//});

//for user
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
Route::get('/user/orders', UserOrdersComponent::class)->name('user.orders');
Route::get('/user/orders/{order_id}', UserOrderDetailsComponent::class)->name('user.orderdetails');
});

//Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function(){
   Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

   Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
   Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
   Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');

   Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
   Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
   Route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');

   
   Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
   Route::get('/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slide_id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    Route::get('/admin/home-categories', AdminHomeCategoryComponent::class)->name('admin.homecategories');

    Route::get('/admin/sale', AdminSaleComponent::class)->name('admin.sale');

    Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/orders/{order_id}',AdminOrderComponent::class)->name('admin.orderdetails');
});


<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [
    'uses'      => 'App\Http\Controllers\MollaController@index',
    'as'        => '/'
]);

Route::get('/about-us', [
    'uses'      => 'App\Http\Controllers\MollaController@about',
    'as'        => 'about'
]);

Route::get('/contact-us', [
    'uses'      => 'App\Http\Controllers\MollaController@contact',
    'as'        => 'contact'
]);

Route::get('/category-product/{id}', [
    'uses'      => 'App\Http\Controllers\MollaController@categoryProduct',
    'as'        => 'category-product'
]);

Route::get('/product-details/{id}', [
    'uses'      => 'App\Http\Controllers\MollaController@productDetails',
    'as'        => 'product-details'
]);


Route::get('/dashboard',[
    'uses'      => 'App\Http\Controllers\DashboardController@index',
    'as'        => 'dashboard',
    'middleware'=> ['auth:sanctum',  'verified'],
]);


// ===== Category Route Start ========
Route::get('/category',[
    'uses'      => 'App\Http\Controllers\CategoryController@category',
    'as'        => 'category',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::get('/create-category',[
    'uses'      => 'App\Http\Controllers\CategoryController@index',
    'as'        => 'create-category',
    'middleware'=> ['auth:sanctum',  'verified'],
]);
Route::post('/create.new',[
    'uses'      => 'App\Http\Controllers\CategoryController@create',
    'as'        => 'create.new',
    'middleware'=> ['auth:sanctum',  'verified'],
]);



Route::get('/manage-category',[
    'uses'      => 'App\Http\Controllers\CategoryController@manage',
    'as'        => 'manage-category',
    'middleware'=> ['auth:sanctum',  'verified'],
]);



Route::get('/category.edit/{id}',[
    'uses'      => 'App\Http\Controllers\CategoryController@edit',
    'as'        => 'category.edit',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::post('/update-category/{id}',[
    'uses'      => 'App\Http\Controllers\CategoryController@update',
    'as'        => 'category.update',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::post('/category.delete/{id}',[
    'uses'      => 'App\Http\Controllers\CategoryController@delete',
    'as'        => 'category.delete',
    'middleware'=> ['auth:sanctum',  'verified'],
]);
// ===== Category Route End ========



// ===== Sub Category Route Start ========
Route::get('/sub-category',[
    'uses'      => 'App\Http\Controllers\SubCategoryController@category',
    'as'        => 'sub-category',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::get('/create-sub-category',[
    'uses'      => 'App\Http\Controllers\SubCategoryController@index',
    'as'        => 'create-sub-category',
    'middleware'=> ['auth:sanctum',  'verified'],
]);
Route::post('/create.new-sub-category',[
    'uses'      => 'App\Http\Controllers\SubCategoryController@create',
    'as'        => 'create.new-sub-category',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::get('/manage-sub-category',[
    'uses'      => 'App\Http\Controllers\SubCategoryController@manage',
    'as'        => 'manage-sub-category',
    'middleware'=> ['auth:sanctum',  'verified'],
]);


Route::get('/sub-category.edit/{id}',[
    'uses'      => 'App\Http\Controllers\SubCategoryController@edit',
    'as'        => 'sub-category.edit',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::post('/update-sub-category/{id}',[
    'uses'      => 'App\Http\Controllers\SubCategoryController@update',
    'as'        => 'sub-category.update',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::post('/sub-category.delete/{id}',[
    'uses'      => 'App\Http\Controllers\SubCategoryController@delete',
    'as'        => 'sub-category.delete',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

// =====Sub Category Route End ========



// ===== Brand Route Start ========
Route::get('/brand',[
    'uses'      => 'App\Http\Controllers\BrandController@brand',
    'as'        => 'brand',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::get('/create-brand',[
    'uses'      => 'App\Http\Controllers\BrandController@index',
    'as'        => 'create-brand',
    'middleware'=> ['auth:sanctum',  'verified'],
]);
Route::post('/create.new-brand',[
    'uses'      => 'App\Http\Controllers\BrandController@create',
    'as'        => 'create.new-brand',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::get('/manage-brand',[
    'uses'      => 'App\Http\Controllers\BrandController@manage',
    'as'        => 'manage-brand',
    'middleware'=> ['auth:sanctum',  'verified'],
]);


Route::get('/brand.edit/{id}',[
    'uses'      => 'App\Http\Controllers\BrandController@edit',
    'as'        => 'brand.edit',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::post('/update-brand/{id}',[
    'uses'      => 'App\Http\Controllers\BrandController@update',
    'as'        => 'brand.update',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::post('/brand.delete/{id}',[
    'uses'      => 'App\Http\Controllers\BrandController@delete',
    'as'        => 'brand.delete',
    'middleware'=> ['auth:sanctum',  'verified'],
]);
// =====Brand Route End ========



// ===== Unit Route Start ========

Route::get('/create-unit',[
    'uses'      => 'App\Http\Controllers\UnitController@index',
    'as'        => 'create-unit',
    'middleware'=> ['auth:sanctum',  'verified'],
]);
Route::post('/create-new-unit',[
    'uses'      => 'App\Http\Controllers\UnitController@create',
    'as'        => 'create.new-unit',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::get('/manage-unit',[
    'uses'      => 'App\Http\Controllers\UnitController@manage',
    'as'        => 'manage-unit',
    'middleware'=> ['auth:sanctum',  'verified'],
]);


Route::get('/unit.edit/{id}',[
    'uses'      => 'App\Http\Controllers\UnitController@edit',
    'as'        => 'unit.edit',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::post('/update-unit/{id}',[
    'uses'      => 'App\Http\Controllers\UnitController@update',
    'as'        => 'unit.update',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::post('/unit.delete/{id}',[
    'uses'      => 'App\Http\Controllers\UnitController@delete',
    'as'        => 'unit.delete',
    'middleware'=> ['auth:sanctum',  'verified'],
]);
// =====Unit Route End ========



// ===== Product Route Start ========
Route::get('/product',[
    'uses'      => 'App\Http\Controllers\ProductController@product',
    'as'        => 'product',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::get('/get-sub-category-by-id',[
    'uses'      => 'App\Http\Controllers\ProductController@getSubCategoryByID',
    'as'        => 'get-sub-category-by-id',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::get('/create-product',[
    'uses'      => 'App\Http\Controllers\ProductController@index',
    'as'        => 'create-product',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::post('/create.new-product',[
    'uses'      => 'App\Http\Controllers\ProductController@create',
    'as'        => 'create-new-product',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::get('/manage-product',[
    'uses'      => 'App\Http\Controllers\ProductController@manage',
    'as'        => 'manage-product',
    'middleware'=> ['auth:sanctum',  'verified'],
]);


Route::get('/product.edit/{id}',[
    'uses'      => 'App\Http\Controllers\ProductController@edit',
    'as'        => 'product.edit',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::post('/update-product/{id}',[
    'uses'      => 'App\Http\Controllers\ProductController@update',
    'as'        => 'product.update',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::post('/product.delete/{id}',[
    'uses'      => 'App\Http\Controllers\ProductController@delete',
    'as'        => 'product.delete',
    'middleware'=> ['auth:sanctum',  'verified'],
]);
// =====Product Route End ========



// ===== Add to Card Route Start ========
Route::post('/cart-add/{id}',[
    'uses'      => 'App\Http\Controllers\CartController@add',
    'as'        => 'cart.add',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::get('/show-cart',[
    'uses'      => 'App\Http\Controllers\CartController@show',
    'as'        => 'cart.show',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::post('/cart-update/{id}',[
    'uses'      => 'App\Http\Controllers\CartController@update',
    'as'        => 'cart.update',
    'middleware'=> ['auth:sanctum',  'verified'],
]);

Route::get('/cart-delete/{id}',[
    'uses'      => 'App\Http\Controllers\CartController@delete',
    'as'        => 'cart.delete',
    'middleware'=> ['auth:sanctum',  'verified'],
]);
// ===== Add to Card Route End ========



// ===== Checkout Route Start ========
Route::get('/checkout',[
    'uses'      => 'App\Http\Controllers\CheckoutController@index',
    'as'        => 'checkout',
    'middleware'=> ['auth:sanctum',  'verified'],
]);
// ===== Checkout Route End ========







//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

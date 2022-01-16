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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[
    'uses'  =>  'App\Http\Controllers\AdminDashboardController@index',
    'as'    =>  '/',
    'middleware'  =>  ['auth:sanctum', 'verified']
]);
Route::get('/dashboard',[
    'uses'          =>  'App\Http\Controllers\AdminDashboardController@dashboard',
    'as'            =>  'dashboard',
    'middleware'    =>  ['auth:sanctum', 'verified']
]);

// ========= Category Route Start  =====================
Route::get('/category',[
    'uses'          => 'App\Http\Controllers\CategoryController@index',
    'as'            => 'category',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::get('/manage-category',[
    'uses'          => 'App\Http\Controllers\CategoryController@showAllcategory',
    'as'            => 'manage-category',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::get('/edit-category/{id}',[
    'uses'          => 'App\Http\Controllers\CategoryController@editCategoryPage',
    'as'            => 'edit-category',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::post('/update-category/{id}',[
    'uses'          => 'App\Http\Controllers\CategoryController@updateCategory',
    'as'            => 'update.category',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::post('/add-category',[
    'uses'          => 'App\Http\Controllers\CategoryController@addCategory',
    'as'            => 'add.category',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::post('/delete-category/{id}',[
    'uses'          => 'App\Http\Controllers\CategoryController@deleteCategory',
    'as'            => 'delete.category',
    'middleware'    => ['auth:sanctum', 'verified']
]);
// ========= Category Route End  =====================


// ========= Sub Category Route Start  =====================
Route::get('/subCategory',[
    'uses'          => 'App\Http\Controllers\SubCategoryController@index',
    'as'            => 'subCategory',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::post('/add-subCategory',[
    'uses'          => 'App\Http\Controllers\SubCategoryController@addSubCategory',
    'as'            => 'add.subCategory',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::get('/manage-subCategory',[
    'uses'          => 'App\Http\Controllers\SubCategoryController@showAllsubCategory',
    'as'            => 'manage-subCategory',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::get('/edit-subCategory/{id}',[
    'uses'          => 'App\Http\Controllers\SubCategoryController@editSubCategoryPage',
    'as'            => 'edit-subCategory',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::post('/update-subCategory/{id}',[
    'uses'          => 'App\Http\Controllers\SubCategoryController@updateSubCategory',
    'as'            => 'update.subCategory',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::post('/delete-subCategory/{id}',[
    'uses'          => 'App\Http\Controllers\SubCategoryController@deleteSubCategory',
    'as'            => 'delete.subCategory',
    'middleware'    => ['auth:sanctum', 'verified']
]);
// ========= Sub Category Route End  =====================


// ========= Brand Route Start  =====================
Route::get('/brand',[
    'uses'          => 'App\Http\Controllers\BrandController@index',
    'as'            => 'brand',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::post('/add-brand',[
    'uses'          => 'App\Http\Controllers\BrandController@addBrand',
    'as'            => 'add.brand',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::get('/manage-brand',[
    'uses'          => 'App\Http\Controllers\BrandController@showAllBrand',
    'as'            => 'manage-brand',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::get('/edit-brand/{id}',[
    'uses'          => 'App\Http\Controllers\BrandController@editBrandPage',
    'as'            => 'edit-brand',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::post('/update-brand/{id}',[
    'uses'          => 'App\Http\Controllers\BrandController@updateBrand',
    'as'            => 'update.brand',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::post('/delete-brand/{id}',[
    'uses'          => 'App\Http\Controllers\BrandController@deleteBrand',
    'as'            => 'delete.brand',
    'middleware'    => ['auth:sanctum', 'verified']
]);
// ========= Brand Route End  =====================


// ========= Product Route Start  =====================
Route::get('/product',[
    'uses'          => 'App\Http\Controllers\ProductController@index',
    'as'            => 'product',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::post('/add-product',[
    'uses'          => 'App\Http\Controllers\ProductController@addProduct',
    'as'            => 'add.product',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::get('/manage-product',[
    'uses'          => 'App\Http\Controllers\ProductController@showAllProduct',
    'as'            => 'manage-product',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::get('/edit-product/{id}',[
    'uses'          => 'App\Http\Controllers\ProductController@editProductPage',
    'as'            => 'edit-product',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::post('/update-product/{id}',[
    'uses'          => 'App\Http\Controllers\ProductController@updateProduct',
    'as'            => 'update.product',
    'middleware'    => ['auth:sanctum', 'verified']
]);
Route::post('/delete-product/{id}',[
    'uses'          => 'App\Http\Controllers\ProductController@deleteProduct',
    'as'            => 'delete.product',
    'middleware'    => ['auth:sanctum', 'verified']
]);
// ========= Product Route End  =====================




//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

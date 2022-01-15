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




//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

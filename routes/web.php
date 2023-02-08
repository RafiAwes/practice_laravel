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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'frontendController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Category
Route::get('/category/', 'categoryController@categorypage');
Route::post('/insert/category/', 'categoryController@addCategories');
Route::get('/delete/category/{id}', 'categoryController@deleteCategory');
Route::get('/edit/category/{id}', 'categoryController@editCategories');
Route::post('/update/category/','categoryController@updateCategory');

// subactegory
Route::get('/sub-category/', 'subCategory@subCategoryPage');
Route::post('/insert/sub/category/', 'subCategory@insertSubCategory');
Route::get('/delete/sub-category/{id}','subCategory@deleteSubcat');
Route::get('/edit/sub-category/{id}','subCategory@editSubcat');
Route::get('/dropdown/{id}','subCategory@categoryDropDown');
Route::post('/update/category/','subcategory@updateCategory');

//Product
Route::get('/add/product/','productcontroller@addProdPage');
Route::post('add/product/','productcontroller@addNewProduct');
Route::get('/view/product/page/','productcontroller@viewProduct');
Route::get('/delete/product/{id}','productcontroller@deleteProduct');
Route::get('/edit/product/{id}', 'productcontroller@editProduct');
Route::post('update/product/','productcontroller@updateProduct');

//front end
Route::get('/product/details','frontendController@ProductDetails');

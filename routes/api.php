<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories', [ApiController::class, 'categories']);
Route::get('sub-categories', [ApiController::class, 'subCategory']);
Route::get('sub-sub-categories', [ApiController::class, 'subSubCategory']);
Route::get('all-products', [ApiController::class, 'allProducts']);
Route::get('product/{id}', [ApiController::class, 'ProductDetails']);

Route::get('sub-category/{id}', [ApiController::class, 'subCategories']);
Route::get('sub-sub-category/{id}', [ApiController::class, 'subSubCategories']);


Route::get('blogs', [ApiController::class, 'allBlogs']);
Route::get('news', [ApiController::class, 'allNews']);
Route::get('news-cat-wise/{id}', [ApiController::class, 'NewsCategorywise']);

Route::get('blogs/{id}', [ApiController::class, 'BlogDetails']);
Route::get('news/{id}', [ApiController::class, 'NewsDetails']);

Route::get('home-page-card', [ApiController::class, 'HomePageCard']);

Route::get('home-page-card/{id}', [ApiController::class, 'HomePageCardDetails']);

Route::get('pages', [ApiController::class, 'allPages']);
Route::get('pages/{id}', [ApiController::class, 'pageDetails']);
Route::get('social-media', [ApiController::class, 'Socialmedia']);

Route::get('clients', [ApiController::class, 'allClients']);
Route::get('clients/{id}', [ApiController::class, 'ClientDetails']);







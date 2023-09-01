<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\GlobalController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/get-random-users', [GlobalController::class, 'getRandomUsers']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/get-random-users', [GlobalController::class, 'getRandomUsers']);

Route::middleware(['auth:sanctum'])->group(function () {

    //USER ENDPOINTS

    Route::get('/logged-user', [UserController::class, 'loggedUser']);
    Route::post('/update-user-image', [UserController::class, 'updateUserImage']);
    Route::patch('/update-user', [UserController::class, 'updateUser']);

    //POSTS ENDPOINTS

    Route::get('/posts/{id}', [PostController::class, 'show']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::patch('/posts/{id}', [PostController::class, 'destroy']);

    //PROFILE ENDPOINTS

    Route::get('/profile/{id}', [ProfileController::class, 'show']);

    //COMMENTS ENDPOINTS

    Route::post('/comments', [CommentController::class, 'store']);
    Route::delete('/comments/{id}', [CommentController::class, 'destroy']);

    //LIKES ENDPOINTS

    Route::post('/likes', [LikeController::class, 'store']);
    Route::post('/likes/{id}', [LikeController::class, 'show']);
});
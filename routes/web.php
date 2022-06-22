<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postsController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\followController;
use App\Http\Controllers\favoriteController;

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

Route::group(['middleware' => ['guest']], function() {

    Route::get('/', function () {
        return view('index');
    })->name('index');

});

Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/top' ,[mainController::class, 'getTop'])
        ->name('top');

    Route::get('/form' ,[postsController::class, 'getForm'])
        ->name('getForm');

    Route::post('/confirm' ,[postsController::class, 'confirm'])
        ->name('confirm');

    Route::post('/store', [postsController::class, 'store'])
        ->name('store');

    Route::get('/post/mylist', [postsController::class, 'showMyPost'])
        ->name('showMyPost');

    Route::get('/post/{post}', [postsController::class, 'showPost'])
        ->name('showPost');

    Route::get('/post/{post}/getEditPost', [postsController::class, 'getEditPost'])
        ->name('getEditPost');

    Route::patch('/post/{post}/editPost', [postsController::class, 'editPost'])
        ->name('editPost');

    Route::post('/post/{post}/deletePost', [postsController::class, 'deletePost'])
        ->name('deletePost');

    Route::patch('/post/{post}/deleteImage', [postsController::class, 'deleteImage'])
        ->name('deleteImage');

    Route::post('/post/{post}/comment', [commentController::class, 'commentStore'])
            ->name('commentStore');

    Route::post('/post/{post}/comment', [commentController::class, 'commentStore'])
        ->name('commentStore');

    Route::patch('/post/{comment}/commentEdit', [commentController::class, 'commentEdit'])
        ->name('commentEdit');

    Route::get('/post/{comment}/getCommentEdit', [commentController::class, 'getCommentEdit'])
        ->name('getCommentEdit');

    Route::post('/post/{comment}/commentDelete', [commentController::class, 'commentDelete'])
        ->name('commentDelete');

    Route::post('/follow/{post}', [followController::class, 'follow'])
        ->name('follow');

    Route::post('/unFollow/{post}', [followController::class, 'unFollow'])
        ->name('unFollow');

    Route::get('/followList', [followController::class, 'getFollowList'])
        ->name('getFollowList');

    Route::get('/followerList', [followController::class, 'getFollowerList'])
        ->name('getFollowerList');

    Route::get('/user/{user}', [postsController::class, 'getUserPage'])
        ->name('getUserPage');

    Route::post('/post/{post}/favorite', [favoriteController::class, 'favorite'])
        ->name('favorite');

    Route::post('/post/{post}/unFavorite', [favoriteController::class, 'unFavorite'])
        ->name('unFavorite');

    Route::get('/favoriteList', [favoriteController::class, 'getFavoriteList'])
        ->name('favoriteList');

    Route::get('/ranking', [postsController::class, 'ranking'])
        ->name('ranking');


});



require __DIR__.'/auth.php';

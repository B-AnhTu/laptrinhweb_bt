<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\UserFavoriteController;

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

// CRUD_User
Route::get('dashboard', [CrudUserController::class, 'dashboard']);

Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');

Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');

Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');

Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hacker/xss', 'XssController@handleXss');
//Post
Route::get('createPost', [UserPostController::class, 'createPost'])->name('post.createPost');
Route::post('createPost', [UserPostController::class, 'postUserPost'])->name('post.postUserPost');

Route::get('readPost', [UserPostController::class, 'readPost'])->name('post.readPost');

Route::get('deletePost', [UserPostController::class, 'deletePost'])->name('post.deletePost');

Route::get('updatePost', [UserPostController::class, 'updatePost'])->name('post.updatePost');
Route::post('updatePost', [UserPostController::class, 'postUpdatePost'])->name('post.postUpdatePost');

Route::get('listPost', [UserPostController::class, 'listPost'])->name('post.listPost');

//Favorite
Route::get('createFavorite', [UserFavoriteController::class, 'createFavorite'])->name('favorite.createFavorite');
Route::post('createFavorite', [UserFavoriteController::class, 'postFavorite'])->name('favorite.postFavorite');

Route::get('updateFavorite', [UserFavoriteController::class, 'updateFavorite'])->name('favorite.updateFavorite');
Route::post('updateFavorite', [UserFavoriteController::class, 'postUpdateFavorite'])->name('favorite.postUpdateFavorite');

Route::get('readFavorite', [UserFavoriteController::class, 'readFavorite'])->name('favorite.readFavorite');

Route::get('deleteFavorite', [UserFavoriteController::class, 'deleteFavorite'])->name('favorite.deleteFavorite');
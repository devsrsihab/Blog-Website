<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\admin\settingsController;
use App\Http\Controllers\admin\categorieController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\FrontEnd\commentsController;
use App\Http\Controllers\FrontEnd\FrontendController;

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



    // profile router
    Route::get('/home',[HomeController::class, 'index'])->name('home');
    Auth::routes();
    // frontEnd route
    Route::get('/',[FrontendController                                      ::class,'index']);
    Route::get('/tutorials/{categorie_slug}',[FrontendController            ::class,'viewCategoriePost']);
    Route::get('/tutorials/{categorie_slug}/{post_slug}',[FrontendController::class, 'viewPost']);
    Route::post('/comments',[commentsController                             ::class, 'store']);
    Route::post('/delete-comment',[commentsController                       ::class, 'destroy']);

// groutp route of admin panel
Route::prefix('admin')->middleware('auth','isAdmin')->group(function(){

    Route::get('/dashboard', [dashboardController::class, 'index']);
    // categorie route
    Route::get('/categorie', [categorieController                      ::class, 'index']);
    Route::get('/addCategorie', [categorieController                   ::class, 'create']);
    Route::post('/addCategories', [categorieController                 ::class, 'store']);
    Route::get('/editCategorie/{categorie_id}', [categorieController   ::class, 'edit']);
    Route::PUT('/updateCategories/{categorie_id}', [categorieController::class, 'update']);
    Route::post('/deleteCategorie', [categorieController               ::class, 'destroy']);
    // posts router
    Route::get('/posts',[PostController               ::class,'index']);
    Route::get('/addPost',[PostController             ::class,'create']);
    Route::post('/addPost',[PostController            ::class,'store']);
    Route::get('/editPost/{post_id}',[PostController  ::class,'edit']);
    Route::PUT('/updatePost/{post_id}',[PostController::class,'update']);
    Route::get('/deletePost/{post_id}',[PostController::class, 'delete']);
    // users router
    Route::get('/users',[userController               ::class,'index']);
    Route::get('/editUser/{user_id}',[userController  ::class,'edit']);
    Route::PUT('/updateUser/{user_id}',[userController::class, 'update']);
    // setting route
    Route::get('/settings',[settingsController ::class, 'index']);
    Route::POST('/settings',[settingsController::class,'savedata']);
    
});



 

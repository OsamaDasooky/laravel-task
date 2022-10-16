<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\test\TestController;

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

Route::get('/', function () {
    return view('home
    ');
});

Route::resource("books", BookController::class);

Route::get('home', function () {
    return view('home');
});

Route::get('view', function () {
    return view('view');
});
Route::get('add', function () {
    return view('add');
});


Route::get('data' , [BookController::class ,'index'] );

Route::get('edit/{id?}' , [BookController::class ,'show']);

Route::put('edit/update/{id}' , [BookController::class ,'update'] );


Route::post('req' , [BookController::class , 'store'] );


Route::get('archive' , [BookController::class , 'archive'] );
Route::get('restore/{id}' , [BookController::class , 'restore'] );
Route::POST('findBook' , [BookController::class , 'findBook'] );
Route::get('sortUp' , [BookController::class , 'sortUp'] );
Route::get('sortDown' , [BookController::class , 'sortDown'] );


Route::get('delete/{id}' , [BookController::class ,'destroy'] );

Route::get('fdelete/{id}' , [BookController::class ,'forceDelete'] );


/////////////////////////////////////////////////////////////////////////////////


    Route::controller(LoginController::class)->group(function(){
        Route::post('register','store');
        Route::post('login','login');
        Route::post('logout','logout');
        // Route::get('archive','archive');
    });


    // Route::get('home', function () {
    //     return view('layout.index');
    // });
    Route::get('login', function () {
        return view('login');
    });
    Route::get('signup', function () {
        return view('signup');
    });


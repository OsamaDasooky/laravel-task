<?php

use App\Models\Author;
use App\Models\BookModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\test\TestController;
use App\Http\Controllers\CustomAuthController;

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
    return view('add' ,[
        'authors' => Author::all()
    ]);
});
Route::get('addAuthor', function () {
    return view('addAuthor');
})->can("admin");


Route::get('data' , [BookController::class ,'index'] )->middleware('auth');

Route::get('edit/{id?}' , [BookController::class ,'show']);

Route::put('/update/{id}' , [BookController::class ,'update'] );


Route::post('req' , [BookController::class , 'store'] );


Route::get('archive' , [BookController::class , 'archive'] );
Route::get('restore/{id}' , [BookController::class , 'restore'] );
Route::POST('findBook' , [BookController::class , 'findBook'] );
Route::get('sortUp' , [BookController::class , 'sortUp'] );
Route::get('sortDown' , [BookController::class , 'sortDown'] );


Route::get('delete/{id}' , [BookController::class ,'destroy'] );

Route::get('fdelete/{id}' , [BookController::class ,'forceDelete'] );

Route::get('author/{id}' , [BookController::class ,'author'] );

Route::post('addAuth' , [BookController::class ,'addAuthor'] );

Route::get('author/{id}' , [BookController::class ,'author'] );
/////////////////////////////////////////////////////////////////////////////////

// Route::get('user',function (){
//     return view('auth.user');
// })->middleware('auth');


//--------------------------------------------------------------------------


Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->middleware('can:admin');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');

Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('face', [CustomAuthController::class, 'face'])->name('face');

Route::get('/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('/callback/google', [GoogleAuthController::class, 'callBackGoogle'])->name('callBackGoogle');

Route::get('/facebook/redirect', [FacebookController::class, 'redirect'])->name('facebook-auth');
Route::get('/facebook/callback', [FacebookController::class, 'callBackFacebook'])->name('callBackFacebook');





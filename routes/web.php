<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\App;


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
Route::get('/test', function () {
    return view('test');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/ghid', function () {
    return view('ghid');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/zona1', function () {
    return view('zona1');
});

Route::get('/zona2', function () {
    return view('zona2');
});

Route::get('/zona3', function () {
    return view('zona3');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/intro', function () {
    return view('welcome');
});


Route::get('/hello',function()
{
    return response('Hello world');
});

Route::get('/posts/{id}',function($id){
   
    return response('Post'.$id);
})->where('id', '[0-9]+');

Route::get('/search', function(Request $request){
    dd($request->name . ' ' . $request->city);
}
);

Route::get('/user/{id}', 'App\Http\Controllers\UserController@show');



Auth::routes();


Route::get('/city/{city}', 'App\Http\Controllers\CityController@show')->name('city.page');


Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/language/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'ro', 'fr'])) {
        abort(400);
    }
    
    App::setLocale($locale);

    // Redirect back to the previous page or any other desired page
    return back();
})->name('language.change');


// Route::post('/language/change', 'App\Http\Controllers\LanguageController@changeLocale')->name('language.change');


// Route::get('/language/{locale?}', function ($locale = null) {
//     if ($locale && !in_array($locale, ['ro', 'en', 'fr'])) {
//         abort(400);
//     }

//     App::setLocale($locale ?: App::getLocale());

//     // ...
// })->name('language.change');





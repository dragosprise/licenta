<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TipProdusController;
use App\Http\Controllers\MestesugController;
use App\Http\Controllers\MapController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\MestesugarController;

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
Route::get('/buton', function () {
    return view('buton');
});

Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('by-category');
Route::get('/city/{post:slug}', [PostController::class, 'show'])->name('view');

Route::get('/', [CategoryController::class, 'index']);

Route::get('/map',[MapController::class, 'map2'] );


Route::get('/shop', [TipProdusController::class, 'shop']);
Route::get('/shop/{tip_produs:slug}', [TipProdusController::class, 'show']);

Route::get('/shop2', [MestesugController::class,'shop']);

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/mestesugar', [MestesugarController::class, 'index'])->name('mestesugar.index');
Route::post('/mestesugar', [MestesugarController::class, 'upload'])->name('mestesugar.upload');

Route::get('/adauga-produs', [PhotoController::class, 'index'])->name('form.create');
Route::post('/adauga-produs', [PhotoController::class, 'upload'])->name('form.upload');

Route::get('/adauga-mestesug', [MestesugController::class, 'index']);
Route::post('/adauga-mestesug', [MestesugController::class, 'upload']);

Route::get('mestesugari', [MestesugarController::class, 'show']);




//Route::get('/intro', function () {
//    return view('welcome');
//});

//Route::get('/hello',function()
//{
//    return response('Hello world');
//});

//Route::get('/post/{id}',function($id){

Route::get('/search', function(Request $request){
    dd($request->name . ' ' . $request->city);
}
);

Route::get('/user/{id}', 'App\Http\Controllers\UserController@show');


Auth::routes();
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

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





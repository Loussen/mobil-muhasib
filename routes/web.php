<?php

use App\Http\Controllers\Front\MainController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

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

$locales = implode('|',array_keys(Config::get('data.locales')));

getRegistrar();

/**
 * @return void
 */
function getRegistrar(): void
{
    Route::controller(MainController::class)->group(function () {
        Route::get('/', 'dashboard')->name('home');
        Route::get('/about', 'about')->name('about');
        Route::get('/services', 'services')->name('services');
        Route::get('/service/{slug}', 'service')->name('service');
        Route::get('/portfolio', 'portfolio')->name('portfolio');
        Route::get('/portfolio/{slug}', 'portfolioDetail')->name('portDetail');
        Route::get('/team', 'team')->name('team');
        Route::get('/our-product', 'ourProduct')->name('ourProduct');
        Route::get('/our-product/{slug}', 'ourProductDetail')->name('ourProductDetail');
        Route::get('/team/{slug}', 'member')->name('member');
        Route::get('/blog', 'blog')->name('blog');
        Route::get('/blog/{slug}', 'article')->name('article');
        Route::get('/faq', 'faq')->name('faq');
        Route::get('/contact', 'contact')->name('contact');
    });
}

Route::group(['prefix' => '{locale?}', 'where' => ['locale' => $locales], 'middleware' => 'locale'], function () {
    getRegistrar();
});

Route::post('/contact_form',[MainController::class,'contactFrom'])->name('contact_form');



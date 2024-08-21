<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes

    if (env('APP_ENV') == 'PRODUCTION') {
        URL::forceScheme('https');
    }

    Route::crud('page', 'PageCrudController');
    Route::crud('portfolio', 'PortfolioCrudController');
    Route::crud('article', 'ArticleCrudController');

    Route::crud('team', 'TeamCrudController');
    Route::crud('faq', 'FaqCrudController');
    Route::crud('contact', 'ContactCrudController');
    Route::crud('partner', 'PartnerCrudController');
    Route::crud('menu-item', 'MenuItemCrudController');
    Route::crud('service', 'ServiceCrudController');
    Route::crud('contact-form', 'ContactFormCrudController');
    Route::crud('our-product', 'OurProductCrudController');
    Route::crud('customers', 'CustomersCrudController');
    Route::crud('tax', 'TaxCrudController');
    Route::crud('customer-info', 'CustomerInfoCrudController');
    Route::crud('legislative-acts', 'LegislativeActsCrudController');
    Route::crud('useful-information', 'UsefulInformationCrudController');
    Route::crud('user', 'AdminCrudController');
});
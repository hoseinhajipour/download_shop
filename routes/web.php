<?php

use App\Http\Controllers\ContentImporter;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('/content-importer', [ContentImporter::class,"index"]);
});

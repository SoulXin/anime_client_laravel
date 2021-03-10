<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','Show@index')->name('index');
// On Going
Route::get('/detail/on_going/{id}/{size}/{episode}',[
    'as' => 'detail_on_going.index',
    'uses' => 'Show@episode_index'
]);
Route::get('/detail/on_going/select/{id}/{size}/{episode}',[
    'as' => 'detail_on_going_select_episode.index',
    'uses' => 'Show@select_episode_index'
]);

// Complete
Route::get('/detail/complete/{id}/{size}/{episode}',[
    'as' => 'detail_complete.index',
    'uses' => 'Show@complete_index'
]);
Route::get('/detail/complete/select/{id}/{size}/{episode}',[
    'as' => 'detail_complete_select_episode.index',
    'uses' => 'Show@select_complete_episode_index'
]);

// Selengkapnya
Route::get('/selengkapnya/{status}',[
    'as' => 'selengkapnya.index',
    'uses' => 'Show@selengkapnya_index'
]);
Route::get('/selengkapnya/detail/{status}/{id}/{size}',[
    'as' => 'selengkapnya_detail.index',
    'uses' => 'Show@selengkapnya_detail_index'
]);

// Search
Route::post('/search',[
    'as' => 'search.index',
    'uses' => 'Show@search_index'
]);

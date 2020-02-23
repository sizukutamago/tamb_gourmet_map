<?php

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
    return view('welcome');
});

Route::post('/slack/subscribe', function (\Illuminate\Http\Request $request) {
    $urls = getUrlFromText($request->event['text'] ?? '');
    return $request;
})->name('slack.subscribe');

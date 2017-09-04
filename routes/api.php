<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {

	return $request->user();
});

//$middleWare = ['middleware' => []];
$groupConfig = [
	'middleware' => ['auth:api'],
];

Route::resource('articles', 'Api\ArticleController', ['only' => ['index']]);
Route::resource('guestbook', 'Api\GuestBookController', ['only' => ['index', 'store']]);
Route::resource('article-types', 'Api\ArticleTypeController', ['only' => ['index']]);

Route::group($groupConfig, function () {

	Route::resource('articles', 'Api\ArticleController', ['except' => ['index']]);
	Route::resource('guestbook', 'Api\GuestBookController', ['except' => ['index', 'store']]);
	Route::resource('article-types', 'Api\ArticleTypeController', ['except' => ['index']]);
	Route::post('upload_image', 'Api\ImageController@upload')->name('upload_image');
	Route::post('upload_file', 'Api\FileController@upload')->name('upload_file');

	Route::resource('config', 'Api\ConfigController');
});

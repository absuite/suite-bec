<?php
$ns = 'Suite\Bec\Http\Controllers';
Route::prefix('api/bec')->middleware(['api', 'auth:api'])->namespace($ns)->group(function () {
	Route::resource('posts', 'PostController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
	Route::resource('prices', 'PriceController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
	Route::resource('tags', 'TagController', ['only' => ['index', 'show', 'store', 'update', 'destroy']]);

});
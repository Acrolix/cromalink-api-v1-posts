<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('oauth')->get('/hello', function (Request $request) {
    return response()->json([
        'message' => 'Hello World! -> API Posts v1',
        'user' => $request->user(),
    ]);
});

Route::group(['prefix'=> 'posts', 'middleware'=> ['oauth']], function () {
    Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('posts.index');
    Route::get('/{id}', [App\Http\Controllers\PostsController::class, 'show'])->name('posts.show');
    Route::put('/{id}', [App\Http\Controllers\PostsController::class, 'update'])->name('posts.update');
    Route::post('/', [App\Http\Controllers\PostsController::class, 'store'])->name('posts.store');
    Route::delete('/{id}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('posts.destroy');
});

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
    Route::get('news', 'index')->name('news.index');
    Route::get('news/edit', 'edit')->name('news.edit');
    Route::post('news/edit', 'update')->name('news.update');
    Route::get('news/delete', 'delete')->name('news.delete');
});

// // 1)間違い
// use App\Http\Controllers\XXX\AAAController;
// //                       ^^^^^^^^^^^^^^^^^ 使用 use するコントローラクラスを宣言している
// Route::controller(AAAController::class)->prefix('XXX')->group(function() {
// //                                     ^^^^^^^^^^^^^^^ URL の接頭辞として XXX を指定している
//     Route::get('bbb');
// //             ^^^^^ URL を指定してしまっている XXX/bbb へのアクセスとなる
// });
// 2)カリキュラム通り
use App\Http\Controllers\AAAController;
Route::controller(AAAController::class)->group(function() {
    Route::get('XXX', 'bbb');
});
// // 3)日本語ドキュメントのシンプルな形
// use App\Http\Controllers\AAAController;
// Route::get('/XXX', [AAAController::class, 'bbb']);

use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('profile/create', 'add');
    Route::get('profile/edit', 'edit');
//                             ^^^^^^ コントローラアクション名を指定する
//             ^^^^^^^^^^^^^^ URL を指定する
    Route::post('profile/create', 'create')->name('profile.create');
    Route::post('profile/edit', 'update')->name('profile.update');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

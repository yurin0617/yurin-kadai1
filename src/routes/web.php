<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

// PG01: 入力画面
Route::get('/', [ContactController::class, 'index']);

// PG02: 確認画面（入力内容を保持して表示する）
Route::post('/confirm', [ContactController::class, 'confirm']);

Route::post('/contacts', [ContactController::class, 'store']);

// PG03: 送信完了画面
Route::post('/thanks', [ContactController::class, 'thanks']);

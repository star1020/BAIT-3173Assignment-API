<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FreeGiftController;
use App\Http\Controllers\GiftRecordController;
use App\Http\Controllers\MembershipController;

Route::resource('memberships', MembershipController::class);
Route::resource('free-gifts', FreeGiftController::class);
Route::resource('gift-records', GiftRecordController::class);
Route::put('free-gifts/decrease/{id}', [FreeGiftController::class, 'decrease']);
Route::put('free-gifts/increase/{id}', [FreeGiftController::class, 'increase']);
Route::get('gift-records/checkPaymentId/{paymentId}', [GiftRecordController::class, 'checkPaymentId']);



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

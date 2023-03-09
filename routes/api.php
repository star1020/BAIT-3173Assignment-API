<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FreeGiftController;


//using this
// Display a list of free gifts
Route::get('free-gifts', [FreeGiftController::class, 'index'])->name('free-gifts.index');

// Show the form for creating a new free gift
Route::get('free-gifts/create', 'FreeGiftController@create')->name('free-gifts.create');

// Store a new free gift
Route::post('free-gifts', 'FreeGiftController@store')->name('free-gifts.store');

// Show the form for editing a free gift
Route::get('free-gifts/{id}/edit', 'FreeGiftController@edit')->name('free-gifts.edit');

// Update a free gift
Route::put('free-gifts/{id}', 'FreeGiftController@update')->name('free-gifts.update');

// Delete a free gift
Route::delete('free-gifts/{id}', 'FreeGiftController@destroy')->name('free-gifts.destroy');




Route::get('data', function () {
    return response()->json([
        $data = ['foo', 'bar', 'baz'],
    ]);
});
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

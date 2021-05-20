<?php

use App\Models\Holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolidayApiController;

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

Route::get('/days', [HolidayApiController::class,'index'])->name('show');

Route::post('/days', [HolidayApiController::class, 'store'])->name('store');

Route::put('/days/{holidays}', [HolidayApiController::class, 'update'])->name('update');

Route::delete('/days/{holidays}', [HolidayApiController::class,'destroy'])->name('delete');
Route::get('/days/{dates}',[HolidayApiController::class, 'check'])->name('check');
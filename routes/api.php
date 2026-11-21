<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// prefix v1 - Предназначен для хранения версий, v2 - будут использоваться новые группы маршрутов,
// которые будут переходить на те же url адреса, только обновленные
Route::prefix('v1')->group(function () {

});

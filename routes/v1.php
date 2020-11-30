
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FindInvestorController;



Route::post('/sign-up', [SignUpController::class, 'store']);
Route::post('/sign-in', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/find-invest', [FindInvestorController::class, 'searchProductInvestor']);


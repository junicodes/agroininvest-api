<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FindInvestorController;

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

Route::get('/', function () {
    return 'Agrion Invest API Activated, please add prefix "v1" to all route e.g. {originUrl}/api/v1/user';
});

Route::prefix('v1')->group( function() {
    require_once "v1.php";
});



<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CategoryBookController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLendingController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('user',UserController::class)->only('index','show');
Route::resource('book',BookController::class)->only('index','show');
Route::resource('category.book',CategoryBookController::class)->only('index');

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get('profile',function(Request $request){
        return auth()->user();
    });
    Route::resource('lending',LendingController::class)->only('index','update','store','destroy');
    Route::resource('user.lendings',UserLendingController::class)->only('index');
    Route::post('logout',[AuthController::class,'logout']);
});





<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;





Route::post('register', [RegisterController::class, 'register']);
Route::post('AuthenticateUser/Validate_User', [RegisterController::class, 'login']);
Route::post('AuthenticateUser/ChangepasswordRequest', [RegisterController::class, 'changepassword']);
     
	 
	 
	 Route::middleware('auth:api')->group( function () {
    Route::resource('products', ProductController::class);
});



Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('get_user', [ApiController::class, 'get_user']);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::post('create', [ProductController::class, 'store']);
    Route::put('update/{product}',  [ProductController::class, 'update']);
    Route::delete('delete/{product}',  [ProductController::class, 'destroy']);
});
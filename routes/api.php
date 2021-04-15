<?php
use App\Http\Controllers\ProudctControler;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::resource('products', ProudctControler::class);

//public route
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/products',[ProudctControler :: class,'index']);
Route::get('/products/{id}',[ProudctControler :: class,'show']);
Route::get('/products/search/{name}',[ProudctControler :: class,'search']);


//protected routes
 Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products',[ProudctControler::class,'store']);
    Route::put('/products/{id}',[ProudctControler::class,'update']);
    Route::delete('/products/{id}',[ProudctControler::class,'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
});

// 
// 


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

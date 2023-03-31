<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProdukController;
use App\Http\Controllers\api\KategoriController;
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

//single route Produk
Route::get('/data_produk',[ProdukController::class,'index']);
Route::post('/data_produk',[ProdukController::class,'store']);
Route::put('/update_produk',[ProdukController::class,'update']);
Route::delete('/hapus_produk',[ProdukController::class,'destroy_single']);


//bundle route produk
Route::resource('/produk',ProdukController::class);

Route::resource('/kategori',KategoriController::class);
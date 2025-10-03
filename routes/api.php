<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CombustibleController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\FilePreviewController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('login', [AuthController::class, 'login']);
    Route::post('me', [AuthController::class, 'userProfile']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);

    Route::post('/files/base64-from-path', [FilePreviewController::class, 'base64FromPath'])->name('files.base64FromPath');    

    Route::prefix('area')->group(function () {
        Route::post('areadenominacionsel', [AreaController::class, 'areadenominacionsel']);
    });

    Route::prefix('combustible')->group(function () {
        Route::post('estadocontratosel', [CombustibleController::class, 'estadocontratosel']);
        Route::post('consumogra', [CombustibleController::class, 'consumogra']);
        Route::post('consumosel', [CombustibleController::class, 'consumosel']);
        Route::post('contratogra', [CombustibleController::class, 'contratogra']);
        Route::post('contratosel', [CombustibleController::class, 'contratosel']);
        Route::post('proveedorgra', [CombustibleController::class, 'proveedorgra']);
        Route::post('proveedorsel', [CombustibleController::class, 'proveedorsel']);
    });

    Route::prefix('master')->group(function () {
        Route::post('sedessel', [MasterController::class, 'sedessel']);
    });

    Route::prefix('seguridad')->group(function () {    
        Route::post('permisoobjetosel', [SeguridadController::class, 'permisoobjetosel']);
        Route::post('perfilusuarioapp', [SeguridadController::class, 'perfilusuarioapp']);
    });

    Route::prefix('vehiculo')->group(function () {    
        Route::post('colorvehiculosel', [VehiculoController::class, 'colorvehiculosel']);
        Route::post('combustiblesel', [VehiculoController::class, 'combustiblesel']);
        Route::post('estadovehiculosel', [VehiculoController::class, 'estadovehiculosel']);
        Route::post('marcasel', [VehiculoController::class, 'marcasel']);
        Route::post('modelosel', [VehiculoController::class, 'modelosel']);
        Route::post('marcamodelosel', [VehiculoController::class, 'marcamodelosel']);
        Route::post('tipovehiculosel', [VehiculoController::class, 'tipovehiculosel']);
        Route::post('vehiculosel', [VehiculoController::class, 'vehiculosel']);
        Route::post('chofersel', [VehiculoController::class, 'chofersel']);
    });

});

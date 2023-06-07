<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function (Router $router) {
    Route::prefix('client')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('client.index');
        Route::get('/create', [ClientController::class, 'create'])->name('client.create');
        Route::post('/store', [ClientController::class, 'store'])->name('client.store');
        Route::get('/{id}/edit', [ClientController::class, 'edit'])->name('client.edit');
        Route::post('/update', [ClientController::class, 'update'])->name('client.update');
        Route::get('/{id}/change/status', [ClientController::class, 'changeStatus'])->name('client.change.status');
    });

});

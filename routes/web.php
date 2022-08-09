<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    UserController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'middleware' => ['auth', 'role:Admin,User']
], function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    // Route Admin
    Route::group([
        'middleware' => 'role:Admin',
        'prefix'    => 'admin'
    ], function () {
        Route::resource('users', UserController::class);
    });

    // Route Users
    Route::group([
        'middleware' => 'role:User'
    ], function () {
        //
    });

    // Route Member
    Route::group([
        'middleware' => 'role:Member'
    ], function () {
        //
    });
});

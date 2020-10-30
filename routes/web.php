<?php

use App\Http\Controllers\QuestionsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'register' => false,
    'reset'    => false,
    'confirm'  => false
]);

Route::middleware('auth')->group(function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('tests', \App\Http\Controllers\TestController::class);

    Route::prefix('/test/{test}')->group(function (){
        Route::resource('questions', QuestionsController::class);

        Route::get('/groups', [\App\Http\Controllers\SpecialitiesController::class, 'index'])->name('test.groups');
        Route::get('/groups/add', [\App\Http\Controllers\SpecialitiesController::class, 'add'])->name('test.groups.add');
        Route::post('/groups/add', [\App\Http\Controllers\SpecialitiesController::class, 'store'])->name('test.groups.store');
        Route::delete('/groups/{group}', [\App\Http\Controllers\SpecialitiesController::class, 'detach'])->name('test.groups.delete');
    });
});

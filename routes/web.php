<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');

//Route::get('/', \App\Livewire\Home::class)->name('Home');

Route::get('/', \App\Livewire\Slider::class)
    ->name('IndexSite');
Route::get('/score', \App\Livewire\Score::class)
    ->name('Score');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/dashboard/member/create', [MemberController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('MemberCreate');

Route::get('/dashboard/member/{record}/edit', \App\Livewire\Members\PPO\EditForm::class)
    ->middleware(['auth', 'verified'])
    ->name('MemberEdit');

//Route::get('/dashboard/member/{record}/edit', [MemberController::class, 'edit'])
//    ->middleware(['auth', 'verified'])->name('MemberEdit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';

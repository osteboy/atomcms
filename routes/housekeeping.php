<?php

use App\Http\Controllers\Housekeeping\DashboardController;
use App\Http\Controllers\Housekeeping\UserController;
use Lab404\Impersonate\Controllers\ImpersonateController;

Route::middleware(['permission:impersonate', 'can.impersonate'])->group(function () {
    Route::impersonate();
    Route::get('/impersonate/leave',[ImpersonateController::class, 'leave'])->name('impersonate.leave')->withoutMiddleware('permission:impersonate');
});

Route::prefix('housekeeping')->middleware('permission:housekeeping_access')->name('hk.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Users
    Route::prefix('users')->group(function () {
       Route::get('/', [UserController::class, 'index'])->name('users.index');
       Route::post('/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
       Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('users.delete');
    });
});

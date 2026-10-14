<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChildPanelController;

Route::middleware(['auth'])->group(function () {
    Route::get('/user/child-panels', [ChildPanelController::class, 'index'])->name('user.child_panels.index');
    Route::post('/user/child-panels', [ChildPanelController::class, 'store'])->name('user.child_panels.store');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChildPanelController;
use App\Http\Controllers\Admin\ChildPanelController as AdminChildPanelController;

// User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/user/child-panels', [ChildPanelController::class, 'index'])->name('user.child_panels.index');
    Route::post('/user/child-panels', [ChildPanelController::class, 'store'])->name('user.child_panels.store');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/child-panels', [AdminChildPanelController::class, 'index'])->name('admin.child_panels.index');
    Route::post('/child-panels/{id}/status', [AdminChildPanelController::class, 'updateStatus'])->name('admin.child_panels.update_status');
});
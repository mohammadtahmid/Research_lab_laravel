<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

route::get('/',[HomeController::class,'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);
//logo part
route::get('view_logo',[AdminController::class,'view_logo'])->middleware(['auth','admin']);
route::post('add_logo',[AdminController::class,'add_logo'])->middleware(['auth','admin']);
route::get('delete_logo/{id}',[AdminController::class,'delete_logo'])->middleware(['auth','admin']);
//slider part
route::get('view_slide',[AdminController::class,'view_slide'])->middleware(['auth','admin']);
route::post('upload_slider',[AdminController::class,'upload_slider'])->middleware(['auth','admin']);
route::get('delete_slider/{id}',[AdminController::class,'delete_slider'])->middleware(['auth','admin']);
route::get('edit_slider/{id}',[AdminController::class,'edit_slider'])->middleware(['auth','admin'])->name('admin.view_slider');
Route::post('update_slider/{id}', [AdminController::class, 'update_slider'])->middleware(['auth','admin'])->name('update_slider');

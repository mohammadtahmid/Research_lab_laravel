<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

route::get('/',[HomeController::class,'home']);

Route::get('/dashboard', function () {
    return view('home.index');
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
route::post('update_slider/{id}', [AdminController::class, 'update_slider'])->middleware(['auth','admin'])->name('update_slider');
//studen list part
route::get('student_list',[AdminController::class,'student_list'])->name('student_list')->middleware(['auth','admin']);
route::post('upload_student',[AdminController::class,'upload_student'])->name('upload_student')->middleware(['auth','admin']);
route::get('delete_student/{id}',[AdminController::class,'delete_student'])->middleware(['auth','admin']);
//teacher info
route::get('teacher_info',[AdminController::class,'teacher_info'])->name('teacher_info')->middleware(['auth','admin']);
route::post('teacher_personal',[AdminController::class,'teacher_personal'])->name('teacher_personal')->middleware(['auth','admin']);
Route::delete('/teacher_personal/{id}', [AdminController::class, 'delete_teacher_personal'])->name('teacher_personal_delete');
Route::get('/teacher_personal_edit/{id}', [AdminController::class, 'teacher_personal_edit'])->name('teacher_personal_edit');
Route::put('/update_teacher_personal/{id}', [AdminController::class, 'update_teacher_personal'])->name('teacher_personal_update')->middleware(['auth','admin']);

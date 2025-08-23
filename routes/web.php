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
route::delete('/teacher_personal/{id}', [AdminController::class, 'delete_teacher_personal'])->name('teacher_personal_delete');
route::get('/teacher_personal_edit/{id}', [AdminController::class, 'teacher_personal_edit'])->name('teacher_personal_edit');
route::put('/update_teacher_personal/{id}', [AdminController::class, 'update_teacher_personal'])->name('teacher_personal_update')->middleware(['auth','admin']);
route::post('teacher_detail_store',[AdminController::class,'teacher_detail_store'])->name('teacher_detail_store')->middleware(['auth','admin']);
route::delete('/teacher_detail/{id}', [AdminController::class, 'delete_teacher_detail'])->name('teacher_detail_delete')->middleware(['auth','admin']);
route::get('/teacher_detail_edit/{id}', [AdminController::class, 'teacher_detail_edit'])->name('teacher_detail_edit')->middleware(['auth','admin']);
route::put('/teacher_detail_update/{id}', [AdminController::class, 'teacher_detail_update'])->name('teacher_detail_update')->middleware(['auth','admin']);
//Article start
route::get('view_article',[AdminController::class,'view_article'])->name('view_article')->middleware(['auth','admin']);
route::post('/research_paper', [AdminController::class, 'research_paper'])->name('research_paper')->middleware(['auth','admin']);
Route::get('research_paper_download/{filename}', [AdminController::class, 'research_paper_download'])->name('research_paper_download');



//Home Student part
route::get('/our_team',[HomeController::class,'our_team'])->name('home.our_team');

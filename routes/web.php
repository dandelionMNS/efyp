<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FypController;
use App\Http\Controllers\FypFilesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//handle User
{
    Route::get('/admin/user', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.user.index');
    Route::get('/admin/users/add', [UserController::class, 'addPage'])->middleware(['auth', 'verified'])->name('admin.user.addPage');
    Route::post('/admin/users/added', [UserController::class, 'add'])->middleware(['auth', 'verified'])->name('admin.user.add');
    Route::get('/admin/user/{id}', [UserController::class, 'userDetails'])->middleware(['auth', 'verified'])->name('admin.user.details');
    Route::put('/user/{id}/update', [UserController::class, 'update'])->middleware(['auth', 'verified'])->name('admin.user.update');
    Route::delete('/admin/user/{id}/delete', [UserController::class, 'userDelete'])->middleware(['auth', 'verified'])->name('admin.user.delete');
}

//Handle Fyp
{
    //Admin
    Route::get('/admin/fyp', [FypController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.fyp.index');

    //Student
    Route::get('/student/{u_id}/fyp/', [FypController::class, 'indexStudent'])->middleware(['auth', 'verified'])->name('student.fyp.index');
    Route::get('/student/{u_id}/fyp/form', [FypController::class, 'form'])->middleware(['auth', 'verified'])->name('student.fyp.form');
    Route::post('/fyp/form/submit', [FypController::class, 'submit'])->middleware(['auth', 'verified'])->name('student.fyp.submit');
    Route::delete('fyp/{fyp_id}/delete', [FypController::class, 'delete'])->middleware(['auth', 'verified'])->name('student.fyp.delete');

}

//Handle FYP File
{
    //Student
    Route::get('/student/fyp/{fyp_id}/attach', [FypFilesController::class, 'attachFile'])->middleware(['auth', 'verified'])->name('student.file.attach');
    Route::post('/student/fyp/{fyp_id}/attach/upload', [FypFilesController::class, 'upload'])->middleware(['auth', 'verified'])->name('student.file.upload');
    Route::get('/student/file/{file_id}', [FypFilesController::class, 'details'])->middleware(['auth', 'verified'])->name('student.file.details');
    Route::delete('/student/file/delete', [FypFilesController::class, 'delete'])->middleware(['auth', 'verified'])->name('student.file.delete');
}

require __DIR__ . '/auth.php';

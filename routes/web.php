<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FypController;

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
    
    Route::put('/user/{id}/update', [UserController::class, 'update     '])->middleware(['auth', 'verified'])->name('admin.user.update');
    Route::delete('/admin/user/{id}/delete', [UserController::class, 'userDelete'])->middleware(['auth', 'verified'])->name('admin.user.delete');

}

//Handle Fyp
{
    Route::get('/admin/fyp', [FypController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.fyp.index');










    Route::get('/fyp/student/{id}', [FypController::class, 'indexStudent'])->middleware(['auth', 'verified'])->name('fyp.index.student');

    Route::post('/fyp/added', [FypController::class, 'add'])->middleware(['auth', 'verified'])->name('fyp.add');

    Route::get('/fyp/admin/{f_id}', [FypController::class, 'details'])->middleware(['auth', 'verified'])->name('fyp.details');
    Route::get('/fyp/student/{f_id}', [FypController::class, 'details'])->middleware(['auth', 'verified'])->name('fyp.detailStudent');

    Route::put('/fyp/admin/{f_id}/updated', [FypController::class, 'update'])->middleware(['auth', 'verified'])->name('fyp.update');
    Route::put('/fyp/student/{f_id}/updated/{id}', [FypController::class, 'updateStudent'])->middleware(['auth', 'verified'])->name('fyp.updateStudent');
    Route::delete('/fyp/{f_id}/deleted', [FypController::class, 'delete'])->middleware(['auth', 'verified'])->name('fyp.delete');
}

require __DIR__.'/auth.php';

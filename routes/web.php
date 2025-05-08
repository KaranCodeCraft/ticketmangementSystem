<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AgentController;

Route::redirect("/", '/note')->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get(uri:'/note', action: [NoteController::class,'index'] )->name(name:'note.index');
    // Route::post(uri:'/note', action: [NoteController::class,'store'] )->name(name:'note.store');
    // Route::get(uri:'/note/create', action: [NoteController::class,'create'] )->name(name:'note.create');
    // Route::get(uri:'/note/{id}', action: [NoteController::class,'show'] )->name(name:'note.show');
    // Route::get(uri:'/note/{id}/edit', action: [NoteController::class,'edit'] )->name(name:'note.edit');
    // Route::put(uri:'/note/{id}/edit', action: [NoteController::class,'update'] )->name(name:'note.update');
    // Route::delete(uri:'/note/{id}/delete', action: [NoteController::class,'destroy'] )->name(name:'note.destroy');
    Route::resource('note', NoteController::class );
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/permission', [PermissionController::class, 'permission'])->name('permission.create');
});


Route::middleware(['auth', RoleMiddleware::class.':admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('tickets', TicketController::class);
});

Route::post('/tickets/{ticket}/reply', [App\Http\Controllers\TicketController::class, 'reply'])->name('tickets.reply');

Route::post('tickets/{ticket}/assignAgent', [TicketController::class, 'assignAgent'])->name('tickets.assignAgent');


Route::resource('agents', AgentController::class);

require __DIR__ . '/auth.php';

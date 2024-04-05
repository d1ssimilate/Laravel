<?php

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



Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/admin',[App\Http\Controllers\AdminController::class,'allContacts'])->name('admin-all');
        Route::get('/admin/{id}',[App\Http\Controllers\AdminController::class,'oneContact'])->name('admin-one');
        Route::get('/admin/{id}/edit',[App\Http\Controllers\AdminController::class,'editContact'])->name('admin-edit');
        Route::post('/admin/{id}/edit',[App\Http\Controllers\AdminController::class,'editContactSubmit'])->name('admin-edit-submit');
        Route::get('/admin/{id}/delete',[App\Http\Controllers\AdminController::class,'deleteContact'])->name('admin-delete');
    });
    
    Route::middleware(['role:admin|user'])->group(function() {
        Route::get('/contact', function () {
            return view('contact.index');
        })->name('contact');

        Route::post('/contact/submit', [App\Http\Controllers\ContactController::class,'submit'])->name('submit');

        Route::get('/contact/all', [App\Http\Controllers\ContactController::class,'allContacts'])->name('contact-all');

        Route::get('/contact/{id}', [App\Http\Controllers\ContactController::class,'oneContact'])->name('contact-one');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

        Route::get('/profile/contacts', [App\Http\Controllers\ContactController::class,'allUserContacts'])->name('profile-contacts');
        
        Route::get('/profile/contacts/{id}', [App\Http\Controllers\ContactController::class,'oneUserContact'])->name('profile-contact');

        Route::get('/profile/contacts/{id}/delete', [App\Http\Controllers\ContactController::class,'deleteUserContact'])->name('profile-contact-delete');

        Route::get('/profile/contacts/{id}/edit', [App\Http\Controllers\ContactController::class,'editUserContact'])->name('profile-contact-edit');

        Route::post('/profile/contacts/{id}/edit', [App\Http\Controllers\ContactController::class,'editUserContactSubmit'])->name('profile-contact-edit-submit');

        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

Route::get('/register', function () {
    return view('auth.register');
});

require __DIR__.'/auth.php';
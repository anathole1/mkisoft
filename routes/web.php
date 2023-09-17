<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BackgroundController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramFrontController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    // Route::get('/', function () {
    //     return view('welcome');
    // });
    Route::get('/', [WelcomeController::class, 'about'])->name('about');
    Route::get('/history',[WelcomeController::class, 'backgrounds'])->name('history');
    Route::get('/staff',[TeamController::class, 'index'])->name('staff.index');
    Route::get('/program',[ProgramFrontController::class,'index'])->name('program.review');
    Route::get('/contactus',[ContactController::class, 'store'])->name('contact.store');
    Route::get('/contact_us',[ContactController::class, 'create'])->name('contact.create');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['verified'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::resource('/categories',CategoryController::class);
        Route::resource('/abouts',AboutController::class);
        Route::resource('/programs',ProgramController::class);
        Route::resource('/staffs',StaffController::class);
        Route::resource('/backgrounds',BackgroundController::class);
        Route::resource('/users',UserController::class);
        Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
        Route::delete('/contacts',[ContactController::class], 'destroy')->name('contact.destroy');
    });

    require __DIR__.'/auth.php';
});

<?php

use App\Http\Controllers\Admin\AlmanachController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LessonsController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\PathsController;
use App\Http\Controllers\Admin\SectionsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\PageController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [MainPageController::class, 'index'])->name('home');


Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/path/{slug}', [HomeController::class, 'path'])->name('path');
Route::get('/path/{path}/lesson/{slug}', [HomeController::class, 'lesson'])->name('path.lesson');

Route::get('/almanach', [HomeController::class, 'almanach'])->name('almanach');
Route::get('/almanach/{itemSlug}', [HomeController::class, 'almanachItem'])->name('almanach.item');

Route::get('/page/{slug}', [PageController::class, 'show'])->name('page');

Route::prefix('/gnipahellir')->middleware(['auth', 'is.admin'])->group(function (){
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('/paths')->group(function (){
        Route::get('/', [PathsController::class, 'index'])->name('admin.paths.index');
        Route::get('/create', [PathsController::class, 'create'])->name('admin.paths.create');
        Route::post('/store', [PathsController::class, 'store'])->name('admin.paths.store');
        Route::get('/edit/{id}', [PathsController::class, 'edit'])->name('admin.paths.edit');
        Route::post('/update/{id}', [PathsController::class, 'update'])->name('admin.paths.update');
        Route::get('/destroy/{id}', [PathsController::class, 'destroy'])->name('admin.paths.destroy');
    });

    Route::prefix('/sections')->group(function (){
        Route::get('/', [SectionsController::class, 'index'])->name('admin.sections.index');
        Route::get('/create', [SectionsController::class, 'create'])->name('admin.sections.create');
        Route::post('/store', [SectionsController::class, 'store'])->name('admin.sections.store');
        Route::get('/edit/{id}', [SectionsController::class, 'edit'])->name('admin.sections.edit');
        Route::post('/update/{id}', [SectionsController::class, 'update'])->name('admin.sections.update');
        Route::get('/destroy/{id}', [SectionsController::class, 'destroy'])->name('admin.sections.destroy');
    });

    Route::prefix('/lessons')->group(function (){
        Route::get('/', [LessonsController::class, 'index'])->name('admin.lessons.index');
        Route::get('/create', [LessonsController::class, 'create'])->name('admin.lessons.create');
        Route::post('/store', [LessonsController::class, 'store'])->name('admin.lessons.store');
        Route::get('/edit/{id}', [LessonsController::class, 'edit'])->name('admin.lessons.edit');
        Route::post('/update/{id}', [LessonsController::class, 'update'])->name('admin.lessons.update');
        Route::get('/destroy/{id}', [LessonsController::class, 'destroy'])->name('admin.lessons.destroy');
    });

    Route::prefix('/users')->group(function (){
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::post('/update/{id}', [LessonsController::class, 'update'])->name('admin.lessons.update');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });

    Route::prefix('/almanachs')->group(function (){
        Route::get('/', [AlmanachController::class, 'index'])->name('admin.almanach.index');
        Route::get('/create', [AlmanachController::class, 'create'])->name('admin.almanach.create');
        Route::post('/store', [AlmanachController::class, 'store'])->name('admin.almanach.store');
        Route::get('/edit/{id}', [AlmanachController::class, 'edit'])->name('admin.almanach.edit');
        Route::post('/update/{id}', [AlmanachController::class, 'update'])->name('admin.almanach.update');
        Route::get('/destroy/{id}', [AlmanachController::class, 'destroy'])->name('admin.almanach.destroy');
    });

    Route::prefix('/pages')->group(function (){
        Route::get('/', [AdminPageController::class, 'index'])->name('admin.pages.index');
        Route::get('/create', [AdminPageController::class, 'create'])->name('admin.pages.create');
        Route::post('/store', [AdminPageController::class, 'store'])->name('admin.pages.store');
        Route::get('/edit/{id}', [AdminPageController::class, 'edit'])->name('admin.pages.edit');
        Route::post('/update/{id}', [AdminPageController::class, 'update'])->name('admin.pages.update');
        Route::get('/destroy/{id}', [AdminPageController::class, 'destroy'])->name('admin.pages.destroy');
    });
});

<?php

use App\Http\Controllers\ProfileController;
use App\Models\NotableLessons;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotableLessonsController;

use App\Http\Controllers\LessonController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\NotController;
use App\Http\Controllers\TeacherController;

//aboutus sayfasını gösterir
Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

//forbidden sayfasını gösterir
Route::get('/forbidden', function () {
    return view('forbidden');
})->name('forbidden');


//dashboard sayfasını gösterir
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('admin.dashboard');
//eğer kullanıcı giriş yapmışsa, erişebileceği sayfaları gösterir
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');//kullanıcı profili düzenleme sayfasını gösterir
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');//kullanıcı profili güncelleme sayfasını gösterir
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');//kullanıcıyı siler

    Route::get('/profile/calendar', [LessonController::class, 'index'])->name('profile.calendar');//kullanıcıya dersleri gösterir
    Route::get('/profile/announcment', [AnnouncementController::class, 'index'])->name('profile.announcment');//kullanıcıya duyuruları gösterir

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
});

require __DIR__ . '/auth.php';


//eğer kullanıcı giriş yapmışsa, admin ve öğretmenlerin erişebileceği sayfaları gösterir
Route::middleware(['auth', 'pages:adminandteacher'])->group(function () {
    Route::get('/profile/listuser', [RegisteredUserController::class, 'show'])->name('profile.listuser');//kullanıcıları listeler
    Route::post('/profile/deleteuser', [RegisteredUserController::class, 'delete'])->name('profile.deleteuser');//kullanıcıyı siler

    Route::post('/notablelessons', [NotableLessonsController::class, 'store'])->name('notablelessons.create');//mevcut olan dersleri gösterir
    Route::get('/notablelessons', [NotableLessonsController::class, 'index'])->name('notablelessons');//mevcut olan dersleri gösterir
    Route::post('/notablelessonsdestroy', [NotableLessonsController::class, 'destroy'])->name('notablelessonsdestroy');//mevcut olan dersleri gösterir




    Route::get('/profile/adduser', [RegisteredUserController::class, 'create']);//kullanıcı ekler
    Route::post('/profile/adduser', [ProfileController::class, 'store'])->name('profile.adduser');//kullanıcı ekler


    Route::get('/admin/list/lesson', [LessonController::class, 'show'])->name('admin.list.lesson');//admin dersleri listeler
    Route::post('/admin/list/lesson', [LessonController::class, 'delete'])->name('admin.list.lesson');//admin dersleri siler

    Route::post('/admin/add/lesson', [LessonController::class, 'store'])->name('admin.add.lesson');//admin ders ekler
    Route::get('/admin/add/lesson', function () {
        return view('admin.add.lesson');
    })->name('admin.add.lesson');//admin ders ekler

    Route::get('/admin/add/announcment', function () {
        return view('admin.add.announcment');
    })->name('admin.add.announcment');//admin duyuru ekler

    Route::post('/admin/add/announcment', [AnnouncementController::class, 'store'])->name('admin.add.anouncment');//admin duyuru ekler


   /* Route::get('teacher/add', function () {
        return view('admin.teacher.add');
    })->name('admin.teacher.add');*/
    Route::get('not/add', function () {
        return view('admin.not.add');
    })->name('admin.not.add');
    /*Route::get('/teacher/list', [TeacherController::class, 'index'])->name('teacher.list');//öğretmenleri gösterir
    Route::post('/teacher/add', [TeacherController::class, 'store'])->name('teacher.add');//öğretmen ekler*/

    Route::get('/not/list', [NotController::class, 'index'])->name('not.list');//notları gösterir
    Route::post('/note/add', [NotController::class, 'store'])->name('not.add');//not ekler
    Route::get('/profile/list/lesson', [LessonController::class, 'index'])->name('profile.list.lesson');//kullanıcıya dersleri gösterir
    Route::post('/profile/list/lesson', [LessonController::class, 'create'])->name('admin.dashboard');//kullanıcıya ders ekler
    Route::delete('/profile/list/lesson', [LessonController::class, 'destroy'])->name('admin.dashboard');//kullanıcının dersini siler
});





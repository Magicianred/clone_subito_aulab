<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;

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



Auth::routes();

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/announcement/new', [HomeController::class, 'announcements'])->name('announcement.new');
Route::post('/announcement/create', [HomeController::class, 'create'])->name('announcement.create');
Route::get('/category/{name}/{id}/announcements', [PublicController::class, 'announcementsByCategory'])->name('public.announcements.category');
Route::get('/detail/{id}', [PublicController::class, 'detail'])->name('detail');
Route::get('/revisor/revisor', [RevisorController::class, 'index'])->name('revisor.revisor');
Route::post('/revisor/announcement/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
Route::post('/revisor/announcement/{id}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');
Route::get('/revisor/deleted', [RevisorController::class, 'deleted'])->name('revisor.deleted');
Route::post('/revisor/announcement/{id}/undo', [RevisorController::class, 'undo'])->name('revisor.undo');

Route::get('/form/email', [HomeController::class, 'email'])->name('form-email');
Route::post('/form/email/submit', [HomeController::class, 'submit'])->name('contacts.submit');
Route::get('/grazie', [HomeController::class, 'thankyou'])->name('thankyou');
Route::get('/annuncioinrevisione', [HomeController::class, 'thankyou2'])->name('thankyou2');

Route::get('/search', [PublicController::class, 'search'])->name('search');

Route::post('/announcement/images/upload', [HomeController::class, 'uploadImage'])->name('announcement.images.upload');

Route::delete('/announcement/images/remove', [HomeController::class, 'removeImage'])->name('announcement.images.remove');

Route::get('/announcement/images', [HomeController::class, 'getImages'])->name('announcement.images');

Route::post('/locale/{locale}', [PublicController::class, 'locale'])->name('locale');

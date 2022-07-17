<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AnnouncementsController;
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

Route::get('/',[PublicController::class,'home'])->name('home');
Route::get('/show/{announcement}', [AnnouncementsController::class,'show'])->middleware('is_accepted')->name('announcement.show');
Route::get('/category/{category}', [AnnouncementsController::class,'showCategory'])->name('category.show');
Route::get('/make-revisor/{user}',[PublicController::class ,'makeRevisor'])->middleware('is_admin')->name('make.revisor');
Route::get('/all-announcements', [PublicController::class, 'allAnnouncement'])->name('all.announcements');
Route::get('/ricerca-annuncio', [PublicController::class, 'ricercaAnnuncio'])->name('ricerca.annuncio');
Route::post('/lingua/{lang}',[PublicController::class, 'setLanguage'])->name('set_language_locale');
Route::get('/contacts',[PublicController::class , 'contacts'])->name('contacts');



// Rotte con middleware auth
Route::middleware('auth')->group(function(){
    Route::get('/nuovo/annuncio', [AnnouncementsController::class, 'createAnnouncement'])->name('announcements.create'); 
    Route::get('/became-revisor', [PublicController::class , 'requestRevisor'])->name('became.revisor');
    Route::get('/profile/{user}', [PublicController::class,'profile'])->name('profile');
    Route::get('/cart' ,[PublicController::class , 'cart'])->name('cart');
    Route::get('/favourite', [PublicController::class , 'favouriteAnn'])->name('favourite');
});    


//Rotte con middleware revisore
Route::middleware('is_revisor')->group(function(){
    Route::patch('/accetta-annuncio/{announcement}',[RevisorController::class, 'acceptAnnouncement'])->name('accept.announcement');
    Route::patch('/rifiuta-annuncio/{announcement}',[RevisorController::class, 'rejectAnnouncement'])->name('reject.announcement');
    Route::get('/revisor-panel',[RevisorController::class,'index'])->name('revisor-panel');
    
    Route::get('/trash-can', [RevisorController::class, 'trash_can'])->name('trash-can');
    
    Route::patch('/manda-in-revisione/{announcement}',[RevisorController::class,'manda_in_revisione'])->name('manda.in.revisione');
    
    Route::delete('/delete/{announcement}',[RevisorController::class,'delete'])->name('delete.announcement');

});

    



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurahController;
use App\Http\Controllers\RecitersController;

Route::controller(RecitersController::class)->group(function()
{
    Route::get('/reciters','RecitersPage')->name('reciters');
    Route::get('/reciters/{reciter_id}','RecitersSuarhPage')->name('reciter-audio');
});

Route::controller(SurahController::class)->group(function()
{
    Route::get('/','GetAllSurah')->name('main');
    Route::get('/{id}','GetSurah')->name('surah');
    Route::get('/en/{id}','SurahTransalte')->name('TranslateSurah');
    Route::get('/{id}/{page}','GetPageOfSurah')->name('SurahPage');
    Route::get('/en/{id}/{page}','NextPageTranslate')->name('TransaltePageAjax');
});






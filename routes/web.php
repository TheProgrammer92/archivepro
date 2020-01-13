<?php


    Route::get('/', function () {
        return view('App');
    });
    Route::get('/{any}', function(){
        return view('App');
    })->where('any', '^(?!api\/)[\/\w\.-]*');



    /*Route::get('/', 'PagesController@home')->name('home');
    Route::get('/piano','PagesController@TheProgrammerPiano')->name('piano');*/


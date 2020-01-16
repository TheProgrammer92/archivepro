<?php

    use Illuminate\Http\Request;

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
    */


    Route::prefix('auth')->group(function () {

        /*Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');*/

        Route::post('register', 'AuthController@register');
        Route::post('registerClient', 'AuthController@registerClient');
        Route::post('login', 'AuthController@login');
        Route::post('test', 'AuthController@test');

        Route::get('refresh', 'AuthController@refresh');
            Route::get('user', 'AuthController@me');
            Route::post('logout', 'AuthController@logout');






    });










    Route::prefix('archive')->group(function () {

        Route::resource('categorie', 'archive\CategorieController');
        Route::resource('service', 'archive\serviceController');
        Route::post('addArchive', 'archive\AddArchiveController@add');
        Route::post('search', 'archive\AddArchiveController@search');
        Route::post('editEtat', 'archive\AddArchiveController@editEtat');
        Route::get('getAll', 'archive\AddArchiveController@getAll');

    });



    Route::prefix('profil')->group(function () {

        Route::post('update','UpdateUserController@update');
        Route::post('updatePassword','UpdateUserController@updatePassword');
        Route::post('updateEmail','UpdateUserController@updateEmail');
        Route::post('avatar','ImageController@store');
    });




    //temoignage
    Route::prefix('temoignage')->group(function () {

        //update user for temoignage
        Route::post('updateUserTemoignage','UpdateTemoignageController@update');

        //make temoignage
        Route::post('make','UpdateTemoignageController@make');
        Route::get('family','UpdateTemoignageController@getFamilly');



    });



    //temoignage
    Route::prefix('temoignage')->group(function () {

        //update user for temoignage
        Route::post('updateUserTemoignage','UpdateTemoignageController@update');

        //make temoignage
        Route::post('make','UpdateTemoignageController@make');
        Route::get('family','UpdateTemoignageController@getFamilly');



    });






    //route pour video



        //  Toute les route commence par le prefix  """video """ bien tenir compte
       Route::prefix('video')->group(function () {

        Route::get('piano/categories','VideoController@getCategoriesVideo');
        Route::get('piano/sous_categories','VideoController@getSousCategoriesVideo');
        Route::get('piano/sousCat/video','VideoController@getRecentVideo');
        Route::get('piano/sousCat/video/play','VideoController@getVideo');
        Route::get('piano/sousCat/video/play/unique','VideoController@getUniqueVideo');
        Route::get('piano/sousCat/video/play/comments','VideoController@getComments');
        Route::get('piano/sousCat/video/play/replique_comments','VideoController@getRepliqueComments');
        Route::get('piano/sousCat/video/play/verify_replique_comment','VideoController@verifyRepliqueComment');
        Route::get('piano/sousCat/video/play/post_comment','VideoController@postComment');
        Route::get('piano/sousCat/video/play/post_replique_comments','VideoController@postRepliqueComment');
        Route::get('piano/sousCat/video/play/get_info_user_post_comment','VideoController@getInfoUserPostComment');


    });







    Route::group(['middleware' => 'auth:api'], function(){
        // Users
        Route::get('users', 'UserController@index')->middleware('isAdmin');
        Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
    });


//messsagerie



    Route::prefix('messagerie')->group(function () {

        Route::get('/membre','MessagerieController@getAllMember');
        Route::post('/insertPageReception','MessagerieController@insertReception');
        Route::get('/showAccueil','MessagerieController@showAccueil');
        Route::get('/message','MessagerieController@getMessage');
        Route::post('/sendMessage','MessagerieController@sendMessage');
    });


    Route::prefix('courrier')->group(function () {

        Route::post('/getAllMember','CourrierController@getAllUser');
        Route::post('/registerCourriel','CourrierController@registerCourriel');

        /// all courrier  or courrier delivered for home
        Route::get('/getAllCourrier','CourrierController@getAllCourrier');
        Route::get('/getAllCourrierRetrait','CourrierController@getAllCourrierDelivered');

        //get send or receive courrier


        Route::get('/getCourrierReceived','CourrierController@getCourrierReceived');
        Route::get('/getCourrierSend','CourrierController@getCourrierSend');


        //notifyCourrier
        Route::get('/getNotifyCourrier','courrier\NotifyController@getNotifyCourrier');


        //search courriel
        Route::post('/searchCourrier','CourrierController@searchCourrier');

        //dev

        //for operation courriel

        Route::post('/deliveCourrier','courrier\OperationCourrierController@deliveCourrier');
        Route::post('/isAttending','courrier\OperationCourrierController@isAttending');
        Route::post('/isSend','courrier\OperationCourrierController@isSend');
        Route::post('/isLost','courrier\OperationCourrierController@isLost');




    });




<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|UserController
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/registered','UserController@saveDataUser')->name('auth.registered');
Route::post('/logged','UserController@logged')->name('auth.logged');

Route::group(['middleware'=>['authchake']],function (){
    // Auth routing
    Route::get('/auth', 'UserController@login')->name('auth.login');
    Route::get('/register', 'UserController@register')->name('auth.register');

    // Routs Sites pages and methods
    Route::get('/','SitesController@showSites')->name('pages.index');
    Route::get('/addsite','SitesController@AddSitePage')->name('pages.addsite');
    Route::get('/editsite/{id}','SitesController@EditSitePage')->name('pages.editsite');
    Route::get('/showsite/{id}','SitesController@showOptionSite')->name('pages.showsite');
    Route::post('/setnewsite','SitesController@setNewSite')->name('pages.setnewsite');
    Route::post('/updatesite/{id}','SitesController@updateSite')->name('pages.updatesite');
    Route::post('/deletesite/{id}','SitesController@deleteSite')->name('pages.deletesite');

    // Get table and postes
    Route::get('/showsite/table/{id}','PostController@getTable')->name('pages.gettable');
    Route::get('/showsite/post/{id}','PostController@getPost')->name('pages.getpost');
    Route::get('/matches','PostController@getAllMatches')->name('pages.matches');
    Route::get('/editmatch/{id}','PostController@editMatchPage')->name('pages.editmatch');

    Route::post('/addmatch/{id}','PostController@addMatch')->name('pages.addmatch');
    Route::post('/updatematch/{id}','PostController@updateMatch')->name('pages.updatematch');
    Route::post('/deletematch/{id}','PostController@deleteMatch')->name('pages.deletematch');
    Route::post('/deleteall/','PostController@deleteAllMatch')->name('pages.deleteall');

    // Routs for create img for site
    Route::get('/createimg','CreateImgController@getPage')->name('pages.createimg');
    Route::get('/editimgsite/{id}','CreateImgController@editPage')->name('pages.editimgsite');
    Route::get('/showimgsite/{id}','CreateImgController@showPage')->name('pages.showimgsite');

    Route::post('/postsetting/{id}','CreateImgController@sendData')->name('pages.postsetting');
    Route::post('/editsetting/{id}','CreateImgController@updateData')->name('pages.editsetting');











});





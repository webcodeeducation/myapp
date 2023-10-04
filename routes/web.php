<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/developer', 'TestingController@developer_home')->name('developer.home');
Route::get('/testing', 'TestingController@testing')->name('articles.index');
Route::get('/edit/{id}', 'TestingController@edit_articles');
Route::get('/delete/{id}', 'TestingController@delete_article');
Route::get('/addnew', 'TestingController@add_new_article');
Route::get('/show', 'TestingController@show_articles');
Route::post('/submitarticle', 'TestingController@submit_new_article')->name('article.new');
Route::post('/updatearticle', 'TestingController@udpate_article')->name('article.update');


/*iCloudEMS*/
Route::get('/icloudems', 'TestingController@icloudehome_home');
Route::post('trans-import', 'TestingController@import')->name('transimport.import');
Route::get('/export-trans','TestingController@exportTrans')->name('export-trans');

Route::get('import',  'ContactsController@import');
Route::post('import', 'ContactsController@parseImport');


Route::get('/', 'ExcelController@index');
Route::post('/import', 'ExcelController@importData');
Route::get('/export', 'ExcelController@exportData');
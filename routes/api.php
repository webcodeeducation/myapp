<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\API\AuthController;
//use App\Http\Controllers\API\NotesController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('demoapi', 'TestingController@demoapi');

//Route::get('posts', 'API\PostAPIController');
Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');

Route::apiResource('/notes', 'API\NotesController'); //->middleware('auth:api');
Route::apiResource('/users', 'API\UserController'); //->middleware('auth:api');
//Route::resource('notes','API\NotesController')->only(['index','store','show','update','destroy']);
Route::post('/showusernotes', 'API\NotesController@showNotesByUserID'); //->middleware('auth:api');
Route::post('/submitnote', 'API\NotesController@store'); //->middleware('auth:api');
Route::post('/updatenote', 'API\NotesController@updateNote'); //->middleware('auth:api');
Route::post('/fetchnotebyId', 'API\NotesController@fetchNoteById'); //->middleware('auth:api');
Route::post('/fetchnotebyuserId', 'API\NotesController@fetchNoteUserById'); //->middleware('auth:api');
Route::post('/deletenotebyId', 'API\NotesController@deleteNoteById'); //->middleware('auth:api');
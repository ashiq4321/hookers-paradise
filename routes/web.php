<?php

use Illuminate\Support\Facades\Route;
use App\Support\Collection;


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

Route::get('/', function () {
    $sedcards = DB::table('sedcards')->where('deleted_at', null)->paginate(20);
    return view('system',['sedcards'=>$sedcards]); 
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/user', 'UserController');

Route::get('/sedcard/list', 'SedCardController@listSedCard')->name('sedcard.list')->middleware('auth');

Route::get('/sedcard/create', 'SedCardController@createSedCard')->name('sedcard.create')->middleware('auth');
Route::post('/sedcard/create', 'SedCardController@sedCardCreated')->name('sedcard.created');

Route::get('/sedcard/edit/{id}', 'SedCardController@editSedCard')->name('sedcard.edit')->middleware('auth');
Route::patch('/sedcard/edit/{id}', 'SedCardController@update')->name('sedcard.update');

Route::get('/sedcard/delete/{id}', 'SedCardController@delete')->name('sedcard.delete')->middleware('auth');



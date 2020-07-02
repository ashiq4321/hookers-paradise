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
Route::get('/user/group/members/{id}', 'UserController@groupmember')->name('user.groupmember')->middleware('auth');
Route::get('/user/group/{id}/member/{sedcard}', 'UserController@addMember')->name('user.addMember')->middleware('auth');
Route::patch('/user/{id}/edit', 'UserController@groupUpdate')->name('user.groupUpdate')->middleware('auth');
Route::get('/user/group/{id}/delete', 'UserController@deleteGroup')->name('user.deleteGroup')->middleware('auth');
Route::get('/user/group/member/{id}/delete/{member}', 'UserController@deleteMember')->name('user.deleteMember')->middleware('auth');
Route::get('/user/group/{id}/accept/{member}', 'UserController@acceptGroup')->name('user.acceptGroup')->middleware('auth');
Route::get('/user/group/{id}/decline/{member}', 'UserController@declineGroup')->name('user.declineGroup')->middleware('auth');
Route::post('/user/group/{id}/member', 'UserController@memberSearch')->name('user.memberSearch')->middleware('auth');

Route::get('/sedcard/show/{id}', 'SedCardController@showSedcard')->name('sedcard.show');

Route::get('/sedcard/list', 'SedCardController@listSedCard')->name('sedcard.list')->middleware('auth');

Route::get('/sedcard/create', 'SedCardController@createSedCard')->name('sedcard.create')->middleware('auth');
Route::post('/sedcard/create', 'SedCardController@sedCardCreated')->name('sedcard.created');

Route::get('/sedcard/edit/{id}', 'SedCardController@editSedCard')->name('sedcard.edit')->middleware('auth');
Route::patch('/sedcard/edit/{id}', 'SedCardController@update')->name('sedcard.update');

Route::get('/sedcard/delete/{id}', 'SedCardController@delete')->name('sedcard.delete')->middleware('auth');

Route::namespace('Admin')->prefix('HPAC')->name('admin.')->middleware('can:admincenter')->group( function() {
    Route::get('/', 'DashboardController@index');
    Route::resource('/users', 'UserController', ['except' => [ 'create', 'store']]);
});
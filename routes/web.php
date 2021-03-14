<?php

use Illuminate\Support\Facades\Route;

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
    return redirect(route('dashboard'));
});
//
//	LOGIN
//
Route::get('login',['as'=>'login', 'uses'=>'loginController@index']);
Route::post('login',['as'=>'loginCheck', 'uses'=>'loginController@login']);

//
//	START OF LOGED AREA
//
Route::middleware('sessionHasLoged')->prefix('user')->group(function () {
	//	DASHBOARD CONTROLLER AREA
	Route::get('dashboard',['as'=>'dashboard', 'uses'=>'dashboardController@index']);

	//	USER DATA CONTROLLER AREA
	Route::get('userAdd',['as'=>'userAddGet', 'uses'=>'userDataController@addIndex']);
	Route::post('userAdd',['as'=>'userAddPost', 'uses'=>'userDataController@add']);
	Route::get('userList/{type}',['as'=>'userList', 'uses'=>'userDataController@userList']);
	Route::get('userEdit/{id}',['as'=>'userEditGet', 'uses'=>'userDataController@editIndex']);
	Route::post('userEdit/{id}',['as'=>'userEditPost', 'uses'=>'userDataController@edit']);

	// OPERATION CONTROLLER AREA
	Route::get('readCard',['as'=>'readCardGet', 'uses'=>'operationalController@readCardIndex']);
	Route::get('readedCard/{card_id}',['as'=>'readedCardGet', 'uses'=>'operationalController@readedCardIndex']);

	Route::get('transaction',['as'=>'transactionGet', 'uses'=>'operationalController@transactionIndex']);
	Route::get('transaction/{card_id}',['as'=>'transactionReadedGet', 'uses'=>'operationalController@transactionReadedIndex']);
	Route::post('transaction/{card_id}',['as'=>'transactionReadedPost', 'uses'=>'operationalController@transactionMinus']);

	Route::get('topup',['as'=>'topupGet', 'uses'=>'operationalController@topupIndex']);
	Route::get('topup/{card_id}',['as'=>'topupReadedGet', 'uses'=>'operationalController@topupReadedIndex']);
	Route::post('topup/{card_id}',['as'=>'topupReadedPost', 'uses'=>'operationalController@topupAdd']);

	// REPORT CONTROLLER AREA
	Route::get('salesReport',['as'=>'salesList', 'uses'=>'reportController@salesList']);
	Route::get('transactionReport',['as'=>'transactionList', 'uses'=>'reportController@transactionList']);


	Route::get('logout',['as'=>'logout', 'uses'=>'loginController@logout']);
});
//
// END OF LOGED AREA
//
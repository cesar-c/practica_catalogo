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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'ctgcontrol@inicio');

Route::get('categorias/{id}', 'ctgcontrol@buscar')->name('categorias');

Route::get('config/{elemento?}','ControlConfig@lista'
	//return view('config', ['elemento'=>$elemento]);
)->name('config');

Route::post('config/fetch', 'ControlConfig@pasarpagina')->name('pagination.fetch');

//Route::post('config/newtabla', 'ControlConfig@cambiartabla')->name('newtabla');

Route::DELETE('eliminar/{id}','ControlConfig@borrarm')->name('borrar');
Route::post('crear','ControlConfig@crear')->name('crear');
Route::get('buscar/{id}','ControlConfig@buscar')->name('buscar');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('list_pdf/{elemento}','ControlConfig@exportPDF')->name('datospdf');

Route::get('list_excel/{elemento}','ControlConfig@exportEXCEL')->name('datosexcel');
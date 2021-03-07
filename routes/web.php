<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Mail\TestMail;


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
    return view('welcome');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('Calendar/event/{mes}','ControllerCalendar@index_month');
Route::get('Calendar/event','ControllerCalendar@index');
Route::get('Evento/form','ControllerEvent@form');
Route::post('Evento/create','ControllerEvent@create');
Route::get('Evento/details/{id}','ControllerEvent@details');
Route::get('Evento/index','ControllerEvent@index');
Route::get('Propiedad/','ControllerPropiedad@index');
Route::get('Propiedad/create','ControllerPropiedad@create')->name('propiedad.create');
Route::get('Propiedad/{id}','ControllerPropiedad@show')->name('propiedad.show');
Route::put('Propiedad/update/{id}','ControllerPropiedad@update');
Route::post('Propiedad/store','ControllerPropiedad@store');
Route::get('Evento/index/{month}','ControllerEvent@index_month');
Route::post('Evento/calendario','ControllerEvent@calendario');
Route::get('/pruebas', function () {
    return view('formPropiedad');
    // if (!isset (Auth::user()->email)){
       
    //     return("no esta logueado");
    //     //die;
    // }
    // echo(Auth::user()->email);
    
})->name('presentacion');

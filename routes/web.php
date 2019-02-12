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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function(){
   // Hier mag je maar komen als je aangemeld bent
   if (Auth::guest()) abort(403); 
   // Maak nu het onderscheid tussen admin en klant
   if (Auth::user()->admin == 0){
       // een klant
       //   .. TODO : haal de klant_id op
       // en return naar ClientController@show -- toon de splash van de klant
       dd('TODO ClientController@show');
   } else
        return view('adminhome'); // toon de splashscreen voor de admin
});

/** Intake **/
Route::get('intakes/{id}/destroy', 'IntakeController@destroy');
Route::resource('intakes', 'IntakeController');

/** Mutualities **/
Route::get('mutualities/{id}/destroy', 'MutualityController@destroy');
Route::resource('mutualities', 'MutualityController');

/** Rooms **/
Route::get('rooms/{id}/destroy', 'RoomController@destroy');
Route::resource('rooms', 'RoomController');



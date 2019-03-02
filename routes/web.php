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
         $client = Auth::user()->client()->first();        
         return redirect()->action('ClientController@show',['id' => $client->id]);   
   } else
        return view('adminhome'); // toon de splashscreen voor de admin
});

// de info
Route::get('/info', function(){
   return view('info');
});

/** Intake **/
Route::get('intakes/{id}/destroy', 'IntakeController@destroy');
Route::resource('intakes', 'IntakeController');

/** Mutualities **/
Route::get('mutualities/{id}/destroy', 'MutualityController@destroy');
Route::resource('mutualities', 'MutualityController');

/** Rooms **/
Route::get('rooms/visualindex', 'RoomController@visualindex');
Route::get('rooms/{id}/destroy', 'RoomController@destroy');
Route::post('rooms/boekinfo', 'RoomController@boekinfo');

Route::resource('rooms', 'RoomController');

/** Hotels **/
Route::resource('hotels', 'HotelController');

/** Clients **/
Route::get('clients/{id}/createWithId', 'ClientController@createWithId');
Route::get('clients/{id}/showAsAdmin', 'ClientController@showAsAdmin');
Route::get('clients/{id}/aanmelden', 'ClientController@aanmelden');
Route::get('clients/{id}/afmelden', 'ClientController@afmelden');
Route::resource('clients', 'ClientController');

/** Service **/
//Route::post('roomservice', 'ServiceController@store');
Route::post('roomservice', 'ServiceController@roomservice');
Route::get('service/{id}/bevestig', 'ServiceController@bevestig');
Route::get('service/{id}/destroy', 'ServiceController@destroy');
Route::get('service/{id}/vraagdestroy', 'ServiceController@vraagdestroy');
Route::get('service/{id}/detail', 'ServiceController@detail');
Route::resource('service', 'ServiceController');

/** Events **/
Route::get('events', 'EventController@index');

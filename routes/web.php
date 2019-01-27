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

Route::get('/welcome', function () {
    return view('welcome_basic');
})->middleware('auth.basic');

Route::get('/', ['middleware' =>'guest', function(){
  return view('ud6');
}]);
// Route::get('/', ['as'=>'index','uses'=>'AppController@index']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/perfil', ['as' => 'perfil', 'uses' => 'PerfilController@perfil']);

Route::post("/home", "PerfilController@editarPerfil")->name('perfil.edit');
Route::post("/editView", 'PerfilController@editView')->name('perfil.editView');

//Rutas CRUD Mensajes
Route::resource('messages', 'MessageController');

//papelera
Route::resource('papelera', 'PapeleraController');
Route::post('papelera', 'PapeleraController@deleteall')->name('papelera.deleteall');

//premium
Route::get('/premium', 'PremiumController@index')->name('premium');
Route::post('/premium/unirse', 'PremiumController@unirse')->name('premium.unirse');

//Adminstrador
Route::get('/admin', 'AdminController@index')->name('admin.index');

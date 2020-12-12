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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/{user}/config', 'UserController@config')->name('user.config'); //El controlador va ha cargar el formulario con los datos
Route::patch('/user/update/{user}','UserController@update')->name('user.update');

//Rutas de imágebnes
Route::get('/image/{user}/save', 'ImagesController@create')->name('image.create'); //Vista para insertar una imágen
Route::patch('/image/save/{id}', 'ImagesController@store'); //Guarda la imágen se evnia junto a la id del usuario
Route::get('/image/file/{file}', 'ImagesController@getImage'); //Devuelve la imágen que se pase como parámetro
Route::get('/image/destroy/{id}','ImagesController@destroy');//Elimina la imágen
Route::get('/image/{id}/update','ImagesController@edit')->name('image.update'); //actualiza una imágen
Route::patch('/image/update/{id}', 'ImagesController@update'); //update img

//Rutas Comentarios
Route::post('/comment/save', 'CommentsController@store'); //Guarda un comentario
Route::get('/comment/destroy/{id}', 'CommentsController@destroy'); //Elimina un comentario solo el usuario autenticado

//Ruta de Likes
Route::get('/like/{id_user}/{id_image}', 'LikesController@create');
Route::get('/dislike/{id}', 'LikesController@destroy'); //Para eliminar solo con la id de los likes

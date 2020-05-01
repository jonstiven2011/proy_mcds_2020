<?php

// Route::get('/', function () {
//     return view('Welcome');
// });

//Login de la pagina
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//******************************************************************* */
//Ruta de Welcome
Route::resource('/', 'WelcomeController');
Route::post('loadcat', 'WelcomeController@loadcat');

//***************************USERS********************************************* */

//Ruta para llamar todos los campos de usuarios
Route::resource('users', 'UserController');

//Ruta vista Importar Usuarios
Route::get('import', 'UserController@importView');

//Ruta controlador para importar usuarios
Route::post('import-list-excel', 'UserController@importExcel')->name('users.import.excel');

// Genera reportes en PDF Reports
Route::get('generate/pdf/users', 'UserController@pdf');

// Genera reportes en EXCEL Reports
Route::get('generate/excel/users', 'UserController@excel');

//********************************CATEGORIES*************************************** */

//Ruta de Categoria
Route::resource('categories', 'CategoriaController');

// Genera reportes en PDF Categories
Route::get('generate/pdf/categories', 'CategoriaController@pdf');

// Genera reportes en EXCEL Categories
Route::get('generate/excel/categories', 'CategoriaController@excel');

//********************************ARTICLES*************************************** */

//Ruta de Articulos
Route::resource('articles', 'ArticleController');

// Genera reportes en PDF Categories
Route::get('generate/pdf/articles', 'ArticleController@pdf');

// Genera reportes en EXCEL Categories
Route::get('generate/excel/articles', 'ArticleController@excel');

// *****************************EDITOR**********************************
// 
Route::get('mydata', 'UserController@mydata');
//Route::put('mydata/{id}', 'UserController@updmydata');
Route::get('editor/index', 'ArticleController@index');
Route::get('editor/create', 'ArticleController@editorcreate');
Route::get('editor/{id}', 'ArticleController@showeditor');
Route::get('editor/{id}/edit', 'ArticleController@updarticle');






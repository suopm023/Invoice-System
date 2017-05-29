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

Route::get('/','InvoiceController@index');

Route::get('/add','InvoiceController@add'); 

Route::post('/create','InvoiceController@create');

Route::get('/edit/{id}','InvoiceController@edit');

Route::delete('/delete/{id}','InvoiceController@delete');

Route::patch('/update','InvoiceController@update');

Route::put('/search','InvoiceController@search');

Route::get('/pdfview/{id}',array('as'=>'pdfview','uses'=>'InvoiceController@pdfview'));
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

Auth::routes(['register'=>false]);

Route::group(['prefix'=>'user','middleware'=>'auth'], function (){

    Route::get('/dashboard',[
        'uses'=>'HomeController@index',
        'as'=>'dashboard'
    ]);//->middleware('auth');

});

Route::group(['prefix'=>'posts','middleware'=>'auth'], function (){
    Route::get('/categories',[
        'uses'=>'PostController@getCategories',
        'as'=>'posts.categories'
    ]);
    Route::post('/new/category',[
        'uses'=>'PostController@postNewCategory',
        'as'=>'new.category'
    ]);
    Route::get('/delete/category/id/{id}',[
        'uses'=>'PostController@getDeleteCategory',
        'as'=>'delete.category'
    ]);
});


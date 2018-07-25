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

Route::get('hello',function(){
    return 'hello,welcome to LaravelAcademy.org';
});
Route::get('/user','UserController@index');
Route::match(['get','post'],'foo',function(){
    return 'this is a request from get or post';
});
Route::any('bar',function(){
    return 'this is a request from any Http verb';
});
Route::get('form',function(){
    return '<form method ="post" action="/foo">'.csrf_field().'<button type="submit">提交</button></form>';
});
Route::redirect('/here','/three',301);

Route::get('/', function(){
    return view('welcome',['website'=>'Hello,Laravel! -- by soitis']);
});
Route::view('view','welcome',['website' => 'Laravel 学院']);
Route::get('user/{id}',function($id){
    return 'user '.$id;
});
Route::get('posts/{post}/comments/{comment}',function($postId,$commentId){
    return $postId . '-' .$commentId;
});
Route::get('names/{name?}',function($name = 'john'){
    return $name;
})->where('name','[A-Za-z]+');
Route::get('names/{id?}',function($id = '0'){
    return $id;
})->where('id','[0-9]+');

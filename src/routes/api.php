<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api'], function() {
    //GETで /api/getにリクエストを送ると、TODOリストが返ってくる
    Route::get('get',  'TodoController@getTodos');

    //タスク名を添えたリクエストを、POSTで/api/addへ送ると、TODOリストに登録できるようにする
    Route::post('add',  'TodoController@addTodo');

    //削除するタスクのIDを添えたリクエストを、POSTで/api/delへ送ると、TODOリストから削除できるようにする
    Route::post('del',  'TodoController@deleteTodo'); 
  }); 

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function getTodos() {
        $todos = Todo::all(); //Todoテーブルからデータを取得
        return $todos; //jsonで返す
    }

    public function addTodo(Request $request){
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();

        $todos = Todo::all();
        return $todos;
    }

    public function deleteTodo(Request $request) {
        $todo = Todo::where('id',$request->id)->delete();

        $todos = Todo::all();
        return $todos;
    }
}

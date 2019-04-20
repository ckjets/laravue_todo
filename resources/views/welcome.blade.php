<!doctype html>
  <html lang="{{ app()->getLocale() }}">
    <head>
      <meta charset="utf-8">
      {{-- Laravelでajax通信を行う際はCSRF対策のために、headに上記のコードを追記する必要がある --}}
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <title>Laravel-Vue-todo</title>
    </head>
    <body>
      <div id="app" style="margin-top:100px;">
        <div class="container">
          <div class="row" style="width: 600px; margin-left:300px">
            <img src="{{ asset('/img/laravue2.png') }}" alt="">
          </div>
          <div class="row mx-auto" style="width: 600px;">
            <div class="col">
                <div class="input-group">
                    <input type="text" class="form-control" style="width:200px;" placeholder="タスクを入力してください" v-model="new_todo">
                    <span class="input-group-btn">
                      <button class="btn btn-success ml-3" type="button" v-on:click="addTodo">タスクを登録</button>
                    </span>
                  </div>
                  <br>
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>タスク名</th>
                    <th>完了ボタン</th>
                  </tr>
                </thead>
                <tbody>
                    {{-- v-bindを使ってtodosを表示 --}}
                    <tr v-for="todo in todos" v-bind:key="todo.id">
                        {{-- Laravelでも{{}}の表記を使うから、混在を防ぐために@をつける --}}
                        <td>@{{todo.id}}</td>
                        <td>@{{todo.title}}</td>
                        <td><button class="btn btn-primary" v-on:click="deleteTodo(todo.id)">完了</button></td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
## Laravelのセットアップ

.envファイル<br>
DBはsqlite<br>
DB_CONNECTION=sqlite // ←mysqlからsqliteに変更<br>
DB_HOST=127.0.0.1 // ←削除<br>
DB_PORT=3306 // ←削除<br>
DB_DATABASE=homestead // ←削除<br>
DB_USERNAME=homestead // ←削除<br>
DB_PASSWORD=secret // ←削除<br>

config > app.phpとdatabase.php
app >>タイムゾーンと言語の変更<br>
database.php
```php
        'default' => [ 
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379), 
            'database' => env('DB_CONNECTION', 'sqlite'),
        ],
```

### Vue.jsとaxiosのインストール
LaravelにはVueとaxiosが既にはいっているので(package.jsonで確認できる)以下コマンドを叩く。
```
$npm install
```

補足:<br>
<strong>npm</strong><br>
npmとは、Node Package Managerの略で、Node.jsで作られたパッケージやライブラリを管理するツールになります。<br>
パッケージマネージャーとはライブラリやパッケージの管理ツールのことです<br> パッケージマネージャを使うことで、使いたいライブラリの導入や削除を簡易にしたり、パッケージ同士の依存関係を管理することができます。<br>

<strong>package.json</strong><br>
package.jsonは、パッケージの依存関係を記述したjsonファイルになります。<br>
このファイルに、プロジェクト毎に必要なパッケージの名前とバージョンを記述すれば、npmが自動で必要なパッケージをインストールしてくれます。<br>
インストールしたパッケージが依存しているパッケージや、さらにそれが依存しているパッケージも自動でインストールしてくれるので、開発環境ごとにインストールさえるパッケージが違うということが起こりません。

引用：https://qiita.com/ryouzi/items/5b0158ba1a77bf4b6004

### DBの用意
databaseフォルダに database.sqliteを作成する<br>
```
$touch database/database.sqlite
```
Laravelではsqliteファイルを利用する場合、デフォルトでdatabase/database.sqliteが使うように設定されています。
そのため、少々の環境設定とdatabase/database.sqliteの用意だけで、すぐにsqliteを使うことができます。

### マイグレーション
```
$php artisan make:migration create_todos_table
```
場所:database/migrations<br>

### シーディング
```
$php artisan make:seeder TodosTableSeeder
```
場所:database/seeds<br>
シーディングファイルにタスクを追加<br>
DatabaseSeeder.phpにTodosTableSeederが使えるようにメソッドを追加<br>

```
$php artisan migrate
$php artisan db:seed
```

## TODOリストの構築
### Laravelのルーティングの設定
返すビューは「resources/views/welcome.blade.php」です。
初回のみビューファイルを返して、フロントからのリクエストは、APIサーバーで処理するようにします。

route/web.php
```php

Route::get('/{app}',function(){
    return view('welcome');
})->where('app','.*');

```
正規表現でどんなURLが打ち込まれてもwelcome.blade.phpが返される<br>

### viewの編集
htmlをブログからコピペ<br>
```
npm run dev
```
補足:https://readouble.com/laravel/5.4/ja/mix.html

### モデルとコントローラー

```
php artisan make:model Models/Todo
php artisan make:controller TodoController
```
詳細はコード

### LaravelのAPIの設定
route/api.php

### Vueの編集
resources/app.js
createdフックについて:https://jp.vuejs.org/v2/guide/instance.html
created フックはインスタンスが生成された後にコードを実行したいときに使われます。<br>

## タスクの追加処理

<strong>大まかな処理</strong><br>
1.Vue.jsでフォームからタスク名を取得<br>
2.axiosでLaravelへリクエストを送る<br>
3.Laravelがテーブルを更新し、TODOリストを返す<br>
4.Vue.jsがTODOリストを取得し、再描画<br>


### laravel側のAPI
タスク名を添えたリクエストを、POSTで/api/addへ送ると、TODOリストに登録できるようにしていく

### コントローラー
addTodoメソッドを追加

### Vue.jsとaxiosでajax
app.jsを編集<br>
addTodoメソッドを追加<br>

### viewの編集
タスク追加のイベントをディレクティブで紐づける<br>
inputタグには、v-modelでdata:new_todoを紐づけ。<br>
buttonタグには、v-onでクリックするとaddTodo()が発火するようにしています。<br>

## タスク削除の処理
<strong>大まかな処理</strong><br>
1.Vue.jsで削除するタスクのIDを取得<br>
2.axiosでLaravelへリクエストを送る<br>
3.Laravelが該当のタスクを削除してテーブルを更新。TODOリストを返す<br>
4.Vue.jsがTODOリストを取得し、再描画<br>

1.laravelのapi追記<br>
2.コントローラにdeleteTodoメソッドの追加<br>
3.vueとaxiosでタスク削除の処理<br>
4.viewの編集(完了ボタンにディレクティブ追記してイベント発火させる)




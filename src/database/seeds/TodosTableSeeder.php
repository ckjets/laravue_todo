<?php

use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            'title' => 'お茶を淹れる'
          ]);
          DB::table('todos')->insert([
            'title' => '洗濯物を干す'
          ]);
          DB::table('todos')->insert([
            'title' => '玄関を掃除する'
          ]);
    }
}

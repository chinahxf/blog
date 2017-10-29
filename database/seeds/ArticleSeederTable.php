<?php

use Illuminate\Database\Seeder;

class ArticleSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('articles')->insert([
            'name' => '文章名1',
            'user_id' => 1,
            'body_text' => '哈喽呀1',
            'body_html' => '哈喽呀1',
            'browse_num' => 78934,
        ]);
        DB::table('articles')->insert([
            'name' => '文章名2',
            'user_id' => 1,
            'body_text' => '哈喽呀1',
            'body_html' => '哈喽呀2',
            'browse_num' => 623225234,
        ]);
        DB::table('articles')->insert([
            'name' => '文章名3',
            'user_id' => 1,
            'body_text' => '哈喽呀1',
            'body_html' => '哈喽呀3',
            'browse_num' => 425234,
        ]);


    }
}

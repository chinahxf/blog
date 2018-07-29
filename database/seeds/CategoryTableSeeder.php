<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([[
            'name' => "思考",
            'category_type' => 'article'
        ],[
            'name' => "杂文",
            'category_type' => 'article'
        ],[
            'name' => "话题",
            'category_type' => 'article'
        ],[
            'name' => "自然",
            'category_type' => 'article'
        ],[
            'name' => "首页",
            'category_type' => 'banner'
        ],[
            'name' => "评论",
            'category_type' => 'comment'
        ]]);
    }
}

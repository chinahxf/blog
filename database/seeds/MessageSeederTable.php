<?php

use Illuminate\Database\Seeder;

class MessageSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<10;$i++){
            DB::table('messages')->insert([
                'article_id' => 1,
                'category_id' => 1,
                'category_name' => '留言',
                'user_id' => $i,
                'to_user_id' => $i,
                'body_text' => "留言".$i,
                'parent_id' => 1,
            ]);
        }
    }
}

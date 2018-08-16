<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->increments('friend_id');
            $table->string('email')->default('');
            $table->string('name')->default('');
            $table->string('url')->default('');
            $table->string('summary')->default('');
            $table->unsignedTinyInteger('status')->default(0)->common('0，没审核，1审核通过,2审核没通过');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
}

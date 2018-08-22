<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('我');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('photo')->nullable();
            $table->string('oauth_type')->default('email');
            $table->integer('oauth_id')->default(0);
            $table->tinyInteger('is_ad_hxf')->default(0);
            $table->string('login_ip')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

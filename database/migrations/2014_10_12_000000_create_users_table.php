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
            $table->string('name',10)->default('我');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('photo')->nullable();
            $table->string('oauth_type',20)->default('email');
            $table->string('oauth_id',50)->default(0);
            $table->tinyInteger('is_ad_hxf')->default(0);
            $table->string('login_ip',20)->nullable();
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

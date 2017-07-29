<?php

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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique()->nullable();
            $table->string('facebook_id')->unique()->nullable();
            $table->string('password', 60);
            $table->decimal('balance', 15, 2)->default(0);
            $table->string('foto')->default('no-foto.png');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('user_info')->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->string('role', 100)->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table){
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('sub_category_id')->unsigned();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('restrict');
            $table->string('product_title');
            $table->string('slug');
            $table->longText('product_description');
            $table->decimal('product_price', 15, 2)->default(0);
            $table->boolean('nego')->default(false);
            $table->boolean('condition')->default(false);
            $table->dateTime('sundul_at');
            $table->string('foto1');
            $table->string('foto2')->nullable()->default(null);
            $table->string('foto3')->nullable()->default(null);
            $table->string('foto4')->nullable()->default(null);
            $table->string('foto5')->nullable()->default(null);
            $table->string('status')->default('mod');
            $table->integer('viewer')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}

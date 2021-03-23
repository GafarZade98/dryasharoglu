<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id')->unsigned();
            $table->unsignedInteger('category_id');
            $table->string('name');
            $table->string('file')->nullable();
            $table->string('slug')->nullable();
            $table->string('details')->nullable();
            $table->integer('price')->nullable();
            $table->text('description')->nullable();
            $table->integer('must')->nullable();
            $table->enum('status',[0,1])->default(1);
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
        Schema::dropIfExists('products');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->integer('is_active')->index()->unsigned();
            $table->bigInteger('category_id')->index()->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->string('color')->nullable();
            $table->string('weight')->nullable();
            $table->string('size')->nullable();
            $table->text('description');
            $table->text('features');
            $table->integer('price');
            $table->integer('stock');
            $table->text('brand')->nullable();

            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}

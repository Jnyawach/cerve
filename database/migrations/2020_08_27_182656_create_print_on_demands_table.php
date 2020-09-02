<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrintOnDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_on_demands', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('brand_id')->unsigned()->index();
            $table->string('title');
            $table->text('description');
            $table->integer('artwork_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('print_on_demands');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference');
            $table->foreignId('order_id')->nullable();
            $table->enum('type', ['DEBIT', 'CREDIT']);
            $table->decimal('amount', 15, 2)->nullable();
            $table->nullableMorphs('loggable');
            $table->enum('status', ['COMPLETED', 'PROCESSING', 'CANCELLED']);
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
        Schema::dropIfExists('transactions');
    }
}

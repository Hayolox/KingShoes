<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

            $table->id();
            $table->integer('receipt_number');
            $table->unsignedBigInteger('package_types_id');
            $table->string('name_shoe');
            $table->string('status');
            $table->timestamps();

        });

        Schema::table('transactions', function (Blueprint $table) {
        
            $table->foreign('receipt_number')->references('receipt_number')->on('identities');
            $table->foreign('package_types_id')->references('id')->on('package_types');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoccounterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_counter', function (Blueprint $table) {
            $table->string('transaction_name')->nullable();
            $table->integer('transaction_year')->nullable();
            $table->integer('transaction_month')->nullable();
            $table->integer('transaction_current_docno')->nullable();
            $table->string('transaction_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_counter');
    }
}

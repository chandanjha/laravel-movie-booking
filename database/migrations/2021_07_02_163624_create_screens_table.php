<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theater_id')->references('id')->on('theaters')->onDelete('cascade');
            $table->integer('gold_row');
            $table->integer('gold_column');
            $table->integer('platinum_row');
            $table->integer('platinum_column');
            $table->integer('normal_row');
            $table->integer('normal_column');
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('screens');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRomanNumeralsConversionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roman_numerals_conversions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Numerals');
            $table->string('integer');
            $table->bigInteger('usage_count');
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
        Schema::dropIfExists('roman_numerals_conversions');
    }
}

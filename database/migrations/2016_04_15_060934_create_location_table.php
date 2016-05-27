<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dubs');
            $table->string('barcode');
            $table->string('accession');
            $table->string('collector');
            $table->string('addcoll');
            $table->string('prefix');
            $table->string('number');
            $table->string('suffix');
            $table->string('collection_day');
            $table->string('collection_month');
            $table->string('collection_year');
            $table->string('country');
            $table->string('florareg');
            $table->string('bkfareacod');
            $table->string('majorarea');
            $table->string('minorarea');
            $table->string('tambon');
            $table->string('protected');
            $table->string('gazetteer');
            $table->string('locality_notes');
            $table->string('habitat');
            $table->dateTime('timestamp_location');
            $table->string('is_export');
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
        Schema::drop('locations');
    }
}

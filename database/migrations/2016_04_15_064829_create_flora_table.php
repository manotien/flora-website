<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFloraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location_id');
            $table->string('family');
            $table->string('genus');
            $table->string('cf');
            $table->string('sp1');
            $table->string('author1');
            $table->string('rank1');
            $table->string('sp2');
            $table->string('author2');
            $table->string('rank2');
            $table->string('sp3');
            $table->string('author3');
            $table->string('plant_description');
            $table->string('phenology');
            $table->string('detby');
            $table->string('detdd');
            $table->string('detmm');
            $table->string('detyy');
            $table->string('detnotes');
            $table->string('cultivated');
            $table->string('cultnotes');
            $table->string('notes');
            $table->string('lat');
            $table->string('ns');
            $table->string('long');
            $table->string('ew');
            $table->string('alt');
            $table->string('altmax');
            $table->string('altnote');
            $table->string('vernacular');
            $table->string('language');
            $table->dateTime('timestamp_flora');
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
        Schema::drop('floras');
    }
}

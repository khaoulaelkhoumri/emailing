<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotis', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('titre');
            $table->string('statut');

            $table->unsignedBigInteger('entité_id');
            $table->foreign('entité_id')->references('id')->on('entites');
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
        Schema::dropIfExists('lotis');
    }
}

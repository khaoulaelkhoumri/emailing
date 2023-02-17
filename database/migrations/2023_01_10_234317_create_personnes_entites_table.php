<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnesEntitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes_entites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personnel_id');
            $table->foreign('personnles_id')->references('id')->on('personnels');
            $table->unsignedBigInteger('entite_id');
            $table->foreign('entite_id')->references('id')->on('entites');
            $table->string('statut');
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
        Schema::dropIfExists('personnes_entites');
    }
}

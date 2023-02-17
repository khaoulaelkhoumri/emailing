<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emailings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compange_id');
            $table->foreign('compange_id')->references('id')->on('companges');
            $table->unsignedBigInteger('loti_id');
            $table->foreign('loti_id')->references('id')->on('lotis');
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
        Schema::dropIfExists('emailings');
    }
}

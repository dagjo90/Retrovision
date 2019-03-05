<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('titre_original');
            $table->string('réalisateur');
            $table->string('acteurs');
            $table->integer('année');
            $table->text('synopsis');
            $table->string('genre');
            $table->string('studio');
            $table->integer('durée');
            $table->string('affiche');
            $table->string('vidéo');
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
        Schema::dropIfExists('films');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sexos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('genero');
          $table->timestamps();
      });

      Schema::table('users', function(Blueprint $table) {
        $table->unsignedInteger('sexo_id')->nullable();
        $table->foreign('sexo_id')->references('id')->on('sexos');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sexos');
    }
}

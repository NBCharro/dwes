<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->string('autor', 50);
            $table->enum('genero', ["Pop", "Rock", "Rap", "Heavy", "Indie", "Otros"]);
            $table->year('temporada');
            $table->string('caratula');
            $table->string('descripcion')->nullable();
            $table->float('precio', 6, 2, true);
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
        Schema::dropIfExists('discos');
    }
};

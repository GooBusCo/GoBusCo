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
        Schema::create('boletos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('origen');
            $table->string('destino');
            $table->dateTime('salida');
            $table->dateTime('llegada');
            $table->integer('duracion');
            $table->string('chofer');
            $table->integer('asiento');
            $table->decimal('costo');
            $table->string('pasajero');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boletos');
    }
};

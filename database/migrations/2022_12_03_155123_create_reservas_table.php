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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->String("num_reserva");
            $table->Date("fecha");
            $table->String("servicio");
            $table->Integer("num_personas");
            $table->String("estado");
            $table->foreignid("restaurante_id")->constrained();
            $table->foreignid("cliente_id")->constrained();
            $table->foreignid("mesa_id")->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
};

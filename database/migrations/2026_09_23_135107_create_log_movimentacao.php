<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('log_movimentacao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_patri');
            $table->foreign('id_patri')->references('id')->on('patrimonio');
            $table->unsignedBigInteger('id_funcionario');
            $table->foreign('id_funcionario')->references('id')->on('funcionarios');
            $table->unsignedBigInteger('id_sala_origem');
            $table->foreign('id_sala_origem')->references('id')->on('salas');
            $table->unsignedBigInteger('id_sala_destino');
            $table->foreign('id_sala_destino')->references('id')->on('salas');
            $table->datetime('data_movimentacao');
            $table->text('motivo_movimentacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_movimentacao');
    }
};

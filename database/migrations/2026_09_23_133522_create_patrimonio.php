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
        Schema::create('patrimonio', function (Blueprint $table) {
            $table->id();
            $table->string('nome_patrimonio',150);
            $table->string('n_patrimonio',20);
            $table->unsignedBigInteger('id_salas');
            $table->foreign('id_salas')->references('id')->on('salas');
            $table->unsignedBigInteger('id_responsa');
            $table->foreign('id_responsa')->references('id')->on('funcionarios');
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patrimonio', function (Blueprint $table) {
            $table->dropForeign(['id_salas']);
            $table->dropColumn('id_salas');
            $table->dropForeign(['id_responsa']);
            $table->dropColumn('id_responsa');
        });
        Schema::dropIfExists('patrimonio');
    }
};

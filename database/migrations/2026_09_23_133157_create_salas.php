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
        Schema::create('salas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_sala',100);
            $table->unsignedBigInteger('id_bloco');
            $table->foreign('id_bloco')->references('id')->on('bloco');
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salas', function (Blueprint $table) {
            $table->dropForeign(['id_bloco']);
            $table->dropColumn('id_bloco');
        });
        Schema::dropIfExists('salas');
    }
};

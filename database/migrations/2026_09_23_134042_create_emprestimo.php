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
        Schema::create('emprestimo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_patrimonio');
            $table->foreign('id_patrimonio')->references('id')->on('patrimonio');
            $table->unsignedBigInteger('id_funcionario');
            $table->foreign('id_funcionario')->references('id')->on('funcionarios');
            $table->date('data_emprestimo');
            $table->date('data_devolucao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emprestimo', function (Blueprint $table) {
            $table->dropForeign(['id_patrimonio']);
            $table->dropColumn('id_patrimonio');
            $table->dropForeign(['id_funcionario']);
            $table->dropColumn('id_funcionario');
        });
        Schema::dropIfExists('emprestimo');
    }
};

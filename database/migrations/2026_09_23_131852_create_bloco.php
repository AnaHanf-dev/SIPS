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
        Schema::create('bloco', function (Blueprint $table) {
            $table->id();
            $table->string('nome_bloco',100);
            $table->unsignedBigInteger('id_area');
            $table->foreign('id_area')->references('id')->on('area_escola');
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bloco', function (Blueprint $table) {
            $table->dropForeign(['id_area']);
            $table->dropColumn('id_area');
        });
        Schema::dropIfExists('bloco');
    }
};

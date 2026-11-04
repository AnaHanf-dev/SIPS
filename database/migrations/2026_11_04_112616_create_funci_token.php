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
        Schema::create('funci_token', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_funcionario');
            $table->foreign('id_funcionario')->references('id')->on('funcionarios')->onDelete('cascade');
            $table->text('token');
            $table->timestamp('valido_ate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('funci_token', function (Blueprint $table) {
            $table->dropForeign(['id_funcionario']);
        });
        Schema::dropIfExists('funci_token');
    }
};

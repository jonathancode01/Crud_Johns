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
        Schema::create('movimentacao', function (Blueprint $table) {
            $table->id();
            # Em bancos de dados relacionais, um tipo de dado BIGINT é um tipo de dados inteiro que pode armazenar números
            # inteiros muito grandes. O termo "unsigned" indica que o valor armazenado não pode ser negativo, ou seja,
            # ele só pode ser um número inteiro positivo ou zero.
            $table->unsignedBigInteger('id_produto');
            # ENUM - permite que uma coluna tenha um conjunto de valores pré-definidos
            $table->enum('tipo_movimentacao', ['entrada','saida']);
            $table->integer('quantidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentacao');
    }
};

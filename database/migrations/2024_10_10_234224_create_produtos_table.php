<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estoque_id')->constrained('estoque')->onDelete('cascade');
            $table->string('produto');
            $table->string('detalhes');
            $table->boolean('perecivel');
            $table->integer('quantidadeAtual');
            $table->integer('quantidadeTotal');
            $table->double('precoCompra');
            $table->double('precoVenda');
            $table->dateTime('dataValidade');
            $table->string('fornecedor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};

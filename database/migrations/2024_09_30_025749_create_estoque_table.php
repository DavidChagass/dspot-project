<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações.
     *
     * Este método cria a tabela 'estoque' no banco de dados.
     */
    public function up(): void
    {
        // Criando a tabela 'estoque' para armazenar informações sobre os estoques das empresas
        Schema::create('estoque', function (Blueprint $table) {
            $table->id();  // Adiciona uma chave primária auto-incrementável chamada 'id'
            $table->string('nome');  // Adiciona uma coluna 'nome' para armazenar o nome do estoque
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');  // Cria uma chave estrangeira 'empresa_id' que referencia a tabela 'empresas'. Se a empresa for excluída, o estoque será excluído automaticamente (onDelete 'cascade')
            $table->timestamps();  // Adiciona as colunas 'created_at' e 'updated_at' para controle de data e hora
        });
    }

    /**
     * Reverte as migrações.
     *
     * Este método remove a tabela 'estoque' caso a migração seja revertida.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoque');  // Remove a tabela 'estoque'
    }
};

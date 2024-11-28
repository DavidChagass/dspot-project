<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Executa as migrações.
     *
     * Este método cria a tabela 'produtos' no banco de dados.
     */
    public function up(): void
    {
        // Criando a tabela 'produtos' para armazenar informações sobre os produtos
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();  // Adiciona uma chave primária auto-incrementável chamada 'id'
            $table->foreignId('estoque_id')->constrained('estoque')->onDelete('cascade');  // Cria uma chave estrangeira 'estoque_id' que referencia a tabela 'estoque'. Se o estoque for excluído, os produtos relacionados também serão excluídos (onDelete 'cascade')
            $table->string('produto');  // Adiciona uma coluna 'produto' para armazenar o nome do produto
            $table->string('detalhes');  // Adiciona uma coluna 'detalhes' para armazenar informações adicionais sobre o produto
            $table->boolean('perecivel');  // Adiciona uma coluna 'perecivel' para indicar se o produto é perecível (booleano)
            $table->integer('quantidadeAtual');  // Adiciona uma coluna 'quantidadeAtual' para armazenar a quantidade atual do produto no estoque
            $table->integer('quantidadeTotal');  // Adiciona uma coluna 'quantidadeTotal' para armazenar a quantidade total do produto (incluindo as entradas e saídas)
            $table->double('precoCompra');  // Adiciona uma coluna 'precoCompra' para armazenar o preço de compra do produto
            $table->double('precoVenda');  // Adiciona uma coluna 'precoVenda' para armazenar o preço de venda do produto
            $table->dateTime('dataValidade')->nullable();  // Adiciona uma coluna 'dataValidade' para armazenar a data de validade do produto
            $table->string('fornecedor');  // Adiciona uma coluna 'fornecedor' para armazenar o nome do fornecedor do produto
            $table->timestamps();  // Adiciona as colunas 'created_at' e 'updated_at' para controle de data e hora
        });
    }

    /**
     * Reverte as migrações.
     *
     * Este método remove a tabela 'produtos' caso a migração seja revertida.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');  // Remove a tabela 'produtos'
    }
};

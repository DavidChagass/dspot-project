<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Executa as migrações.
     *
     * Este método cria a tabela 'empresas' no banco de dados.
     */
    public function up(): void
    {
        // Criando a tabela 'empresas' para armazenar informações das empresas
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();  // Adiciona uma chave primária auto-incrementável chamada 'id'
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Cria uma chave estrangeira 'user_id' que referencia a tabela 'users'. Se o usuário for excluído, a empresa será excluída (onDelete 'cascade')
            $table->string('dominio')->unique();  // Adiciona uma coluna 'dominio' para armazenar o domínio da empresa, que será único
            $table->string('telefone')->nullable();  // Adiciona uma coluna 'telefone' para armazenar o telefone da empresa (pode ser nula)
            $table->timestamps();  // Adiciona as colunas 'created_at' e 'updated_at' para controle de data e hora
        });
    }

    /**
     * Reverte as migrações.
     *
     * Este método remove a tabela 'empresas' caso a migração seja revertida.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');  // Remove a tabela 'empresas'
    }
};

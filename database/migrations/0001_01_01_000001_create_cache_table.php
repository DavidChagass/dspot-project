<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações.
     *
     * Este método cria as tabelas necessárias no banco de dados para o cache e controle de bloqueios.
     */
    public function up(): void
    {
        // Criando a tabela 'cache' para armazenar dados de cache
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();  // A chave de cache é a chave primária
            $table->mediumText('value');  // O valor associado à chave de cache
            $table->integer('expiration');  // O tempo de expiração do cache (em segundos)
        });

        // Criando a tabela 'cache_locks' para gerenciar bloqueios de cache
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();  // A chave de bloqueio é a chave primária
            $table->string('owner');  // O proprietário do bloqueio (geralmente, a identificação do processo que adquiriu o bloqueio)
            $table->integer('expiration');  // O tempo de expiração do bloqueio (em segundos)
        });
    }

    /**
     * Reverte as migrações.
     *
     * Este método remove as tabelas criadas caso a migração seja revertida.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');  // Remove a tabela 'cache'
        Schema::dropIfExists('cache_locks');  // Remove a tabela 'cache_locks'
    }
};

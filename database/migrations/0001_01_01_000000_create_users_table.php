<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Executa as migrações.
     *
     * Este método cria as tabelas necessárias no banco de dados.
     */
    public function up(): void
    {
        // Criando a tabela 'users'
        Schema::create('users', function (Blueprint $table) {
            $table->id();  // Adiciona uma chave primária auto-incrementável chamada 'id'
            $table->string('nome');  // Adiciona uma coluna 'nome' para o nome do usuário
            $table->string('email')->unique();  // Adiciona uma coluna 'email' única
            $table->string('password');  // Adiciona uma coluna 'password' para a senha do usuário
            $table->string('role');  // Adiciona uma coluna 'role' para identificar o papel (ex: gerente, funcionário, empresa)
            $table->timestamp('email_verified_at')->nullable();  // Adiciona uma coluna 'email_verified_at' para data de verificação de e-mail (pode ser nula)
            $table->foreignId('empresa_id')->nullable()->constrained('empresas')->onDelete('set null');  // Adiciona uma chave estrangeira para a tabela 'empresas' com 'set null' em caso de exclusão
            $table->rememberToken();  // Adiciona uma coluna 'remember_token' para gerenciamento de sessão
            $table->timestamps();  // Adiciona as colunas 'created_at' e 'updated_at' para controle de data e hora
        });

        // Criando a tabela 'password_reset_tokens'
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();  // Define o 'email' como chave primária para esta tabela
            $table->string('token');  // Adiciona uma coluna 'token' para armazenar o token de redefinição de senha
            $table->timestamp('created_at')->nullable();  // Adiciona uma coluna 'created_at' para armazenar a data de criação do token (pode ser nula)
        });

        // Criando a tabela 'sessions'
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();  // Define o 'id' como chave primária para a tabela de sessões
            $table->foreignId('user_id')->nullable()->index();  // Adiciona uma chave estrangeira para a tabela 'users', podendo ser nula, e cria um índice
            $table->string('ip_address', 45)->nullable();  // Adiciona uma coluna 'ip_address' para armazenar o endereço IP do usuário (pode ser nula)
            $table->text('user_agent')->nullable();  // Adiciona uma coluna 'user_agent' para armazenar o agente do usuário (informações do navegador) (pode ser nula)
            $table->longText('payload');  // Adiciona uma coluna 'payload' para armazenar os dados da sessão
            $table->integer('last_activity')->index();  // Adiciona uma coluna 'last_activity' para rastrear a última atividade da sessão, com índice para otimizar consultas
        });
    }

    /**
     * Reverte as migrações.
     *
     * Este método remove as tabelas criadas caso a migração seja revertida.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');  // Remove a tabela 'users'
        Schema::dropIfExists('password_reset_tokens');  // Remove a tabela 'password_reset_tokens'
        Schema::dropIfExists('sessions');  // Remove a tabela 'sessions'
    }
};

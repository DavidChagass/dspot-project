<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações.
     *
     * Este método cria as tabelas necessárias no banco de dados para o gerenciamento de filas de jobs.
     */
    public function up(): void
    {
        // Criando a tabela 'jobs' para armazenar os jobs na fila
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();  // Adiciona uma chave primária auto-incrementável chamada 'id'
            $table->string('queue')->index();  // Adiciona uma coluna 'queue' que armazena a fila e cria um índice para otimização de buscas
            $table->longText('payload');  // Armazena os dados do job a ser processado
            $table->unsignedTinyInteger('attempts');  // Registra o número de tentativas de execução do job
            $table->unsignedInteger('reserved_at')->nullable();  // Registra o timestamp de quando o job foi reservado (pode ser nulo)
            $table->unsignedInteger('available_at');  // Registra o timestamp de quando o job estará disponível para execução
            $table->unsignedInteger('created_at');  // Registra o timestamp de quando o job foi criado
        });

        // Criando a tabela 'job_batches' para agrupar jobs em lotes
        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();  // Define a coluna 'id' como chave primária para a tabela de lotes
            $table->string('name');  // Nome do lote de jobs
            $table->integer('total_jobs');  // Número total de jobs no lote
            $table->integer('pending_jobs');  // Número de jobs pendentes de execução no lote
            $table->integer('failed_jobs');  // Número de jobs que falharam no lote
            $table->longText('failed_job_ids');  // Armazena os IDs dos jobs que falharam
            $table->mediumText('options')->nullable();  // Armazena opções adicionais para o lote, podendo ser nulo
            $table->integer('cancelled_at')->nullable();  // Timestamp indicando quando o lote foi cancelado (pode ser nulo)
            $table->integer('created_at');  // Timestamp de criação do lote
            $table->integer('finished_at')->nullable();  // Timestamp indicando quando o lote foi concluído (pode ser nulo)
        });

        // Criando a tabela 'failed_jobs' para armazenar jobs que falharam
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();  // Adiciona uma chave primária auto-incrementável chamada 'id'
            $table->string('uuid')->unique();  // Adiciona uma coluna 'uuid' única para identificar cada job falhado
            $table->text('connection');  // Armazena a conexão usada para o job
            $table->text('queue');  // Armazena a fila do job
            $table->longText('payload');  // Armazena os dados do job falhado
            $table->longText('exception');  // Armazena a exceção que causou a falha do job
            $table->timestamp('failed_at')->useCurrent();  // Registra o timestamp de quando o job falhou, usando a data e hora atual
        });
    }

    /**
     * Reverte as migrações.
     *
     * Este método remove as tabelas criadas caso a migração seja revertida.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');  // Remove a tabela 'jobs'
        Schema::dropIfExists('job_batches');  // Remove a tabela 'job_batches'
        Schema::dropIfExists('failed_jobs');  // Remove a tabela 'failed_jobs'
    }
};

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Preenche o banco de dados com dados iniciais.
     *
     * Este método insere dados nas tabelas para popular o banco de dados.
     */
    public function run(): void
    {
        // Criando 10 usuários utilizando a fábrica (comentado por enquanto)
        // User::factory(10)->create();

        /* Criando um usuário específico para testar a inserção (comentado por enquanto)
        User::factory()->create([
            'nome' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */

        // Inserindo dados na tabela 'users' para criar um usuário do tipo 'empresa'
        DB::table('users')->insert([
            'nome' => 'empresa',  // Nome do usuário
            'email' => 'empresa@gmail.com',  // E-mail do usuário
            'password' => Hash::make('12345678'),  // Senha do usuário, utilizando o Hash para segurança
            'role' => 'empresa',  // Função do usuário, que neste caso é 'empresa'
            'empresa_id' => null  // Nenhuma empresa associada a este usuário, pois ele é o administrador
        ]);

        // Inserindo dados na tabela 'empresas' para criar uma empresa associada ao usuário
        DB::table('empresas')->insert([
            'user_id' => 1,  // ID do usuário associado à empresa
            'dominio' => '12345-1*23',  // Domínio único da empresa
            'telefone' => '999999999',  // Telefone da empresa
        ]);

        // Inserindo dados na tabela 'users' para criar um usuário do tipo 'gerente' associado a uma empresa
        DB::table('users')->insert([
            'nome' => 'gerente',  // Nome do gerente
            'email' => 'gerente@gmail.com',  // E-mail do gerente
            'password' => Hash::make('12345678'),  // Senha do gerente
            'role' => 'gerente',  // Função do usuário, que neste caso é 'gerente'
            'empresa_id' => 1,  // Associando este gerente à empresa com ID 1
        ]);

        // Inserindo dados na tabela 'estoque' para criar um estoque associado à empresa
        DB::table('estoque')->insert([
            'nome' => 'frutas',  // Nome do estoque, neste caso 'frutas'
            'empresa_id' => 1,  // ID da empresa associada ao estoque
        ]);

        // Inserindo dados na tabela 'produtos' para criar um produto no estoque
        DB::table('produtos')->insert([
            'estoque_id' => 1,  // ID do estoque ao qual o produto pertence
            'produto' => 'banana',  // Nome do produto
            'detalhes' => 'uma banana',  // Descrição do produto
            'perecivel' => true,  // Indicando que o produto é perecível
            'quantidadeAtual' => 50,  // Quantidade atual disponível no estoque
            'quantidadeTotal' => 100,  // Quantidade total de unidades (incluindo as entradas e saídas)
            'precoCompra' => 1.99,  // Preço de compra do produto
            'precoVenda' => 2.99,  // Preço de venda do produto
            'dataValidade' => '2023-12-31',  // Data de validade do produto
            'fornecedor' => 'industrias frutas',  // Nome do fornecedor do produto
        ]);
    }
}

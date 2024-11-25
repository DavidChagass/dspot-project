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
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

/*         User::factory()->create([
            'nome' => 'Test User',
            'email' => 'test@example.com',
        ]);
 */

        DB::table('users')->insert([
            'nome' => 'empresa',
            'email' => 'empresa@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'empresa',
            'empresa_id' => null
        ]);

        DB::table('empresas')->insert([
            'user_id' => 1,
            'dominio' => '12345-1*23',
            'telefone' => '999999999',
        ]);


        DB::table('users')->insert([
            'nome' => 'gerente',
            'email' => 'gerente@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'gerente',
            'empresa_id' => 1,
        ]);

        DB::table('estoque')->insert([
            'nome' => 'frutas',
            'empresa_id' => 1,
        ]);

        DB::table('produtos')->insert([
            'estoque_id' => 1,
            'produto' => 'banana',
            'detalhes' => 'uma banana',
            'perecivel' => true,
            'quantidadeAtual' => 50,
            'quantidadeTotal' => 100,
            'precoCompra' => 1.99,
            'precoVenda' => 2.99,
            'dataValidade' => '2023-12-31',
            'fornecedor' => 'industrias frutas',
        ]);



    }
}

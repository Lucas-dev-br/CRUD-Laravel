<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Funcionario::create([
            'nome' => 'João Silva',
            'cpf' => '12345678901',
            'data_nascimento' => '1990-01-01',
            'telefone' => '11999999999',
            'genero' => 'Masculino',
        ]);

        Funcionario::create([
            'nome' => 'Maria Oliveira',
            'cpf' => '98765432100',
            'data_nascimento' => '1985-05-10',
            'telefone' => '21988888888',
            'genero' => 'Feminino',
        ]);
    }
}

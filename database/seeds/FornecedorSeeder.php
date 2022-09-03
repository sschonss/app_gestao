<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 01';
        $fornecedor->site = 'fornecedor01.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'fornecedor01@contato.com';
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'Fornecedor 02',
            'site' => 'fornecedor02.com.br',
            'uf' => 'RJ',
            'email' => 'fornecedor02@contato.com'
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 03',
            'site' => 'fornecedor03.com.br',
            'uf' => 'MG',
            'email' => 'forncecodor03@contato.com'
        ]);
    }
}

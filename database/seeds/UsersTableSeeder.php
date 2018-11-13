<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'John Doe',            
            'cpf'  => '111111111',
            'email' => 'john.doe@example.com',
            'endereco'  => 'sres',
            'cidade'  => 'brasilia',
            'complemento'  => 'Apartamento 01',
            'perfil'  => 'Admin',
        	'password' => bcrypt('321ewq'),
        ]);
        DB::table('users')->insert([
            'name' => 'Wesllen Alves',
            'cpf'  => '111111111',
            'email' => 'wesllenalves@gmail.com',
            'endereco'  => 'sres',
            'cidade'  => 'brasilia',
            'complemento'  => 'Apartamento 01',
            'perfil'  => 'Admin',        	
        	'password' => bcrypt('123456'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Teste',
            'cpf'  => '111111111',
            'email' => 'teste@teste.com',
            'endereco'  => 'sres',
            'cidade'  => 'brasilia',
            'complemento'  => 'Apartamento 01',
            'perfil'  => 'Admin',        	
        	'password' => bcrypt('123456'),
        ]);
        
        DB::table('produtos')->insert([
                'nome' => 'Cadeira',
                'medidas'  => '400Altura X 100Largura',
                'descricao' => 'uma cadeira sem muitas descrições',
                'valorMedio'  => '50.00',
                'gastoMedio'  => '20.00',
                'lucroMedio'  => '60',
                'tempoFabricacao'  => '2 semanas',        	
            	'categoria' => 'Moveis',
            ]);

            DB::table('vendas')->insert([
                'FkUsers' => 1,
                'FkProdutos'  => 1,
                'qtd' => '2',
                'dataEntrega'  => '2018-11-22',
                'valorUnd'  => '50.00',
                'valorTotal'  => '120.00',
                'desconto'  => '00.00',        	
            	'gasto' => '00.00',
            	'taxaEntrega' => '20.00',
            	'taxaAdd' => '00.00',
            	'statusVenda' => 'Fazendo',
            	'entrada' => '00.00',
            	'descricao' => 'cliente exigente',
            	'medidas' => '0000x0000',
            ]);
            DB::table('lancamentos')->insert([
                'tipo' => 'Receita',
                'descricao' => 'Pagamento de Cliente',                
                'cliente' => ' Valeria',
                'valor' => '200.00',
                'data_vencimento' => '2018-11-22', 
                'formaPgto' => 'Dinheiro',
                'status' => 'Pago',                              
                'data_pagamento' => '2018-11-22',
            ]);

            DB::table('lancamentos')->insert([
                'tipo' => 'Despesa',
                'descricao' => 'Pagamento de Cliente',                
                'cliente' => ' Valeria',
                'valor' => '200.00',
                'data_vencimento' => '2018-11-22', 
                'formaPgto' => 'Dinheiro',
                'status' => 'Devendo',                              
                'data_pagamento' => NULL,
            ]);
    }
}

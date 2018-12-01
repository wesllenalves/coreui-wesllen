<?php

use Illuminate\Database\Seeder;

class LancamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

<?php

use Illuminate\Database\Seeder;

class VendasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
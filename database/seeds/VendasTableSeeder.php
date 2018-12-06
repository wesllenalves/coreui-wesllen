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
            'statusVenda' => 'Em andamento',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
        ]);
        DB::table('vendas')->insert([
            'FkUsers' => 1,
            'FkProdutos'  => 1,
            'qtd' => '2',
            'dataEntrega'  => '2018-11-22',
            'valorUnd'  => '50.00',
            'valorTotal'  => NULL,
            'desconto'  => NULL,        	
            'gasto' => NULL,
            'taxaEntrega' => NULL,
            'taxaAdd' => NULL,
            'statusVenda' => 'Negociando',
            'entrada' => NULL,
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
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
            'statusVenda' => 'Negociando',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
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
            'statusVenda' => 'Orcamento',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
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
            'statusVenda' => 'Cancelado',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
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
            'statusVenda' => 'Cancelado e estornado',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
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
            'statusVenda' => 'Em aberto',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
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
            'statusVenda' => 'Fechado',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
        ]);DB::table('vendas')->insert([
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
            'statusVenda' => 'Fechado',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
        ]);
    }
}

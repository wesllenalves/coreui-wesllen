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
            'dataEntrega'  => '2018-11-22',
            'valorTotal'  => NULL,            
            'statusVenda' => 'Negociando',
            'entrada' => NULL,
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
        ]);

        DB::table('vendas')->insert([
            'FkUsers' => 1,
            'dataEntrega'  => '2018-11-22',
            'valorTotal'  => '120.00',            
            'statusVenda' => 'Negociando',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
        ]);
        DB::table('vendas')->insert([
            'FkUsers' => 1,
            'dataEntrega'  => '2018-11-22',
            'valorTotal'  => '120.00',            
            'statusVenda' => 'Orcamento',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
        ]);
        DB::table('vendas')->insert([
            'FkUsers' => 1,
            'dataEntrega'  => '2018-11-22',
            'valorTotal'  => '120.00',            
            'statusVenda' => 'Em andamento',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
        ]);
        
        
        
        DB::table('vendas')->insert([
            'FkUsers' => 1,
            'dataEntrega'  => '2018-11-22',
            'valorTotal'  => '120.00',           
            'statusVenda' => 'Cancelado',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
        ]);

        DB::table('vendas')->insert([
            'FkUsers' => 1,
            'dataEntrega'  => '2018-11-22',
            'valorTotal'  => '120.00',            
            'statusVenda' => 'Cancelado e estornado',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
        ]);

        DB::table('vendas')->insert([
            'FkUsers' => 1,
            'dataEntrega'  => '2018-11-22',
            'valorTotal'  => '120.00',
            'statusVenda' => 'Em aberto',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
        ]);
        DB::table('vendas')->insert([
            'FkUsers' => 1,
            'dataEntrega'  => '2018-11-22',
            'valorTotal'  => '120.00',
            'statusVenda' => 'Fechado',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
        ]);DB::table('vendas')->insert([
            'FkUsers' => 1,
            'dataEntrega'  => '2018-11-22',
            'valorTotal'  => '120.00',
            'statusVenda' => 'Fechado',
            'entrada' => '00.00',
            'descricao' => 'cliente exigente',
            'medidas' => '0000x0000',
        ]);
    }
}

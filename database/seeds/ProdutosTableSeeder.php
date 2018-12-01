<?php

use Illuminate\Database\Seeder;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

        DB::table('produtos')->insert([
            'nome' => 'Sofa',
            'medidas'  => 'xxxxxxxxxxxxx',
            'descricao' => 'uma sofa sem muitas descrições',
            'valorMedio'  => '100.00',
            'gastoMedio'  => '50.00',
            'lucroMedio'  => '50',
            'tempoFabricacao'  => '2 meses',        	
            'categoria' => 'Moveis',
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class ProjetosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projetos')->insert([
            'titulo' => 'Balcao',
            'imagem' => '/img3.jpg',                
            'preco' => '200.00',
            'status' => 'galeria',
            
        ]);
        DB::table('projetos')->insert([
            'titulo' => 'Balcao',
            'imagem' => '/img2.jpg',                
            'preco' => '200.00',
            'status' => 'galeria',
            
        ]);
        DB::table('projetos')->insert([
            'titulo' => 'Balcao',
            'imagem' => '/img1.jpg',                
            'preco' => '200.00',
            'status' => 'galeria',
            
        ]);
        DB::table('projetos')->insert([
            'titulo' => 'Balcao',
            'imagem' => '/img3.jpg',                
            'preco' => '200.00',
            'status' => 'galeria',
            
        ]);
        DB::table('projetos')->insert([
            'titulo' => 'Balcao',
            'imagem' => '/img2.jpg',                
            'preco' => '200.00',
            'status' => 'galeria',
            
        ]);
        DB::table('projetos')->insert([
            'titulo' => 'Balcao',
            'imagem' => '/img1.jpg',                
            'preco' => '200.00',
            'status' => 'galeria',
            
        ]);
        DB::table('projetos')->insert([
            'titulo' => 'Balcao',
            'imagem' => '/img1.jpg',                
            'preco' => '200.00',
            'status' => 'principal',
            
        ]);
        DB::table('projetos')->insert([
            'titulo' => 'Balcao',
            'imagem' => '/img3.jpg',                
            'preco' => '200.00',
            'status' => 'principal',
            
        ]);
        DB::table('projetos')->insert([
            'titulo' => 'Balcao',
            'imagem' => '/img2.jpg',                
            'preco' => '200.00',
            'status' => 'principal',
            
        ]);
    }
}

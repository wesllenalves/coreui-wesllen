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
    }
}

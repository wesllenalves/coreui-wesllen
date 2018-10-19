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
        	'email' => 'john.doe@example.com',
        	'password' => bcrypt('321ewq'),
        ]);
        DB::table('users')->insert([
        	'name' => 'Wesllen Alves',
        	'email' => 'wesllenalves@gmail.com',
        	'password' => bcrypt('123456'),
        ]);
    }
}

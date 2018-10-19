<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->smallIncrements('idUsuario');
            $table->string('name', 100);
            $table->string('cpf', 16);
            $table->string('email', 191)->unique();
            $table->string('endereco', 255);
            $table->string('cidade', 100);
            $table->string('complemento', 45)->default();
            $table->string('perfil', 45);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

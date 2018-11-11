<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLancamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lancamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo', 255);            
            $table->string('descricao', 255); 
            $table->string('cliente', 255);           
            $table->decimal('valor', 18,2);
            $table->date('data_vencimento');
            $table->string('formaPgto', 50);
            $table->string('status', 50)->nullable($value = true)->default('Devendo');
            $table->date('data_pagamento')->nullable($value = true);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lancamentos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdutosVendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_venda')->unsigned();
            $table->foreign('id_venda')->references('idVenda')->on('vendas')->onDelete('cascade');               
            $table->integer('id_produto')->unsigned();
            $table->foreign('id_produto')->references('idProduto')->on('produtos')->onDelete('cascade');
            $table->string('qtd',255)->nullable();
            $table->string('valor', 255)->nullable();
                
                
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
        Schema::dropIfExists('produtos_vendas');
    }
}

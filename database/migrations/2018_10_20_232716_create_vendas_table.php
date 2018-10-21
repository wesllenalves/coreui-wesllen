<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('idVenda');

            $table->integer('FkUsers')->unsigned();            
            $table->foreign('FkUsers')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('FkProdutos')->unsigned();            
            $table->foreign('FkProdutos')
                ->references('idProduto')->on('produtos')
                ->onDelete('cascade');

            $table->string('qtd', 11);
            $table->date('dataEntrega', 18,2);
            $table->decimal('valorUnd', 18,2);
            $table->decimal('valorTotal', 18,2);
            $table->decimal('desconto', 18,2);
            $table->decimal('gasto', 18,2);
            $table->decimal('taxaEntrega', 18,2);
            $table->decimal('taxaAdd', 18,2);
            $table->string('statusVenda', 45);
            $table->string('entrada', 45);
            $table->string('descricao', 45);
            $table->string('medidas', 45);

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}

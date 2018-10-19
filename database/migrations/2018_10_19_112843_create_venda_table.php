<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda', function (Blueprint $table) {
            $table->BigIncrements('idVenda');
            
            
            $table->integer('qtd', 11)->nullable();
            $table->date('dataEntrega', 18,2);
            $table->decimal('valorUnd', 18,2);
            $table->decimal('valorTotal', 18,2);
            $table->decimal('desconto', 18,2);
            $table->decimal('gasto', 18,2);
            $table->decimal('taxaEntrega', 18,2);
            $table->decimal('taxaAdd', 18,2);
            
            $table->integer('fkUsuario')->nullable()->unsigned();
            

            $table->integer('fkProduto')->nullable()->unsigned();
            
                    
            $table->string('statusVenda', 45);
            $table->string('entrada', 45);
            $table->string('descricao', 45);
            $table->string('medidas', 45);
            $table->timestamps();
            $table->engine = 'InnoDB';

            /*$table->foreign('fkUsuario')->references('idUsuario')->on('users')->onDelete('cascade');
            
            $table->foreign('fkProduto')->references('idProduto')->on('produto')->onDelete('cascade');*/
        });

        Schema::table('venda', function (Blueprint $table) {
             $table->foreign('fkUsuario')->references('idUsuario')->on('users')->onDelete('cascade');
            
            $table->foreign('fkProduto')->references('idProduto')->on('produto')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venda');
    }
}

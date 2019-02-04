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
            $table->date('dataEntrega', 18,2)->nullable();
            $table->decimal('valorTotal', 18,2)->nullable()->default(00.00);
            $table->string('statusVenda', 45)->default('Negociando')->nullable();
            $table->string('entrada', 45)->nullable()->default(00.00);
            $table->string('descricao', 45)->nullable();
            $table->string('medidas', 45)->nullable();
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
        Schema::dropIfExists('vendas');
    }
}

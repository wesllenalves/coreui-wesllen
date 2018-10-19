<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->smallIncrements('idProduto');
            $table->string('nome', 100);
            $table->string('medidas', 100);
            $table->string('descricao', 100);
            $table->decimal('valorMedio', 18,2);
            $table->decimal('gastoMedio', 18,2);
            $table->decimal('lucroMedio', 18,2);
            $table->string('tempoFabricacao', 45);
            $table->string('categoria', 100)->default();
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
        Schema::dropIfExists('produto');
    }
}

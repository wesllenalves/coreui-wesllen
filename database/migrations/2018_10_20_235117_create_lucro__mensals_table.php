<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLucroMensalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lucro__mensals', function (Blueprint $table) {
            $table->increments('idMensal');
            $table->integer('fkVenda')->unsigned();
            $table->foreign('fkVenda')
                    ->references('idVenda')->on('vendas')
                    ->onDelete('cascade'); 
            $table->string('mes', 45);
            $table->year('ano', 4);
            $table->decimal('lucroTotal', 18,2);
            $table->timestamps();
          /* */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lucro__mensals');
    }
}

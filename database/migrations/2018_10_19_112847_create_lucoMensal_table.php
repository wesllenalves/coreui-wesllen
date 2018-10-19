<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLucoMensalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lucoMensal', function (Blueprint $table) {
            $table->increments('idMensal');
            $table->integer('fkVenda')->unsigned()->unique(); 
            $table->string('mes', 45);
            $table->year('ano', 4);
            $table->decimal('lucroTotal', 18,2);

            $table->foreign('fkVenda')
                    ->references('idVenda')
                    ->on('venda')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('lucoMensal');
    }
}

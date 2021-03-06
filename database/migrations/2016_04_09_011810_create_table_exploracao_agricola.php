<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExploracaoAgricola extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exploracoes', function (Blueprint $table) {
           $table->increments('id')->onDelete('cascade');
           $table->string('nome');
           $table->bigInteger('numero');
           $table->string('distrito');
           $table->string('concelho');
           $table->string('freguesia');
           //$table->integer('area');
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
        Schema::drop('exploracoes');
    }
}

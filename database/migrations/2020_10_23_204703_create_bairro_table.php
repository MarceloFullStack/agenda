<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBairroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bairro', function (Blueprint $table) {
            $table->bigIncrements('id_bairro');
            $table->string('nome');
            $table->unsignedBigInteger('cidade_id_cidade');

            $table->foreign('cidade_id_cidade')->references('id_cidade')->on('cidade')->onDelete('cascade');
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
        Schema::dropIfExists('bairro');
    }
}

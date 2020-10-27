<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->bigIncrements('id_endereco');
            $table->string('cep');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('complemento');

            $table->unsignedBigInteger('bairro_id_bairro');
            $table->unsignedBigInteger('cliente_id_cliente');

            $table->foreign('bairro_id_bairro')->references('id_bairro')->on('bairro')->onDelete('cascade');
            $table->foreign('cliente_id_cliente')->references('id_cliente')->on('cliente')->onDelete('cascade');

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
        Schema::dropIfExists('endereco');
    }
}

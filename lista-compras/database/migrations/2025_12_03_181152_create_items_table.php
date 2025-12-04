<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() // criar a tabela 'items' no banco de dados
    { // Define a estrutura da tabela 'items'
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('quantidade');
            $table->timestamps(); // Cria as colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() // deletar a tabela 'items' do banco de dados
    {
        Schema::dropIfExists('items');
    }
};

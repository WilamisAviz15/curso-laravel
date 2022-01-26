<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //table filiais
        Schema::create('filiais', function(Blueprint $table){
            $table->id();
            $table->string('filial', 50);
            $table->timestamps();
        });
        //table prod_filiais
        Schema::create('produto_filiais', function(Blueprint $table){
            $table->id();
            
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_max');

            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->timestamps();
        });

        //removendo colm da table produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->dropColumn('preco_venda');
            $table->dropColumn('estoque_minimo');
            $table->dropColumn('estoque_maximo');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //add column na table produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->decimal('preco_venda', 8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_max');
        });

        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    }
}

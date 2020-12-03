<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIgredientsPizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('igredients_pizzas', function (Blueprint $table) {
            $table->bigIncrements('Idigredients_pizza');
            $table->string('Ilosc',30);
            $table->timestamps();
            $table->softDeletes();
            // utworzenie klucza obcego
            $table->unsignedBigInteger('id');
            // ustawienia klucza obcego
            $table->foreign('id')->references('id')->on('pizzas');
             // utworzenie klucza obcego
             //$table->unsignedBigInteger('SkladnikiId');
             // ustawienia klucza obcego
            // $table->foreign('SkladnikiId')->references('IdSkladniki')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('igradients_pizzas');
    }
}

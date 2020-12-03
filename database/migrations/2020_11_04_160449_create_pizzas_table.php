<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NazwaPizza',30);
            $table->decimal('CenaBazowa',10,2);
            $table->timestamps();
            $table->softDeletes();
            // utworzenie klucza obcego
            $table->unsignedBigInteger('IdSkladniki');
            // ustawienia klucza obcego
            $table->foreign('IdSkladniki')->references('id')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizzas');
    }
}

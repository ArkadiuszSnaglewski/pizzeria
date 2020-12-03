<?php

namespace Database\Seeders;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ordersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $faker = Factory::create();
        $rangeMax = 10000.0;

        for($i = 0; $i < 10; $i++) {
            DB::table('orders')->insert([
                /*
                  $table->bigIncrements('IdZamowienie');

            $table->timestamps();
            $table->softDeletes();
             // utworzenie klucza obcego
             $table->unsignedBigInteger('IdKlient');
             $table->unsignedBigInteger('IdPizza');
             // ustawienia klucza obcego
             $table->foreign('IdKlient')->references('IdKlient')->on('client');
             $table->foreign('IdPizza')->references('IdPizza')->on('pizza');
                */
                'IdZamowienie' =>  $i+1,

                // losowa data w zadanym zakresie
                'created_at' => $faker->dateTimeBetween(
                     '-20 days',
                     '-10 days'
                 ),
                 'updated_at' => rand(0, 9) < 5
                    ? null
                    : $faker->dateTimeBetween(
                        '-10 days',
                        '-5 days'
                  ),
                  'deleted_at' => rand(0, 9) < 8
                     ? null
                     : $faker->dateTimeBetween(
                         '-5 days',
                         'now'
                   )
            ]);
        }
    }
}

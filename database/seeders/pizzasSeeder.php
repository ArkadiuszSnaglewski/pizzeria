<?php

namespace Database\Seeders;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pizzasSeeder extends Seeder
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
            DB::table('pizzas')->insert([
                /*
                   $table->bigIncrements('IdPizza');
            $table->string('NazwaPizza',30);
            $table->decimal('CenaBazowa',10,2);
            $table->timestamps();
            $table->softDeletes();
            // utworzenie klucza obcego
            $table->unsignedBigInteger('IdSkladniki');
            // ustawienia klucza obcego
            $table->foreign('IdSkladniki')->references('IdSkladniki')->on('ingredients');
        });
                */
                'id'=>$i+1,
                'NazwaPizza' => Str::random(30),
                'CenaBazowa' => rand(1, 10),
                'IdSkladniki'=> rand(1,10),
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
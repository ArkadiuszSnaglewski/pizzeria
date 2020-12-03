<?php

namespace Database\Seeders;
use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ingredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for($i = 0; $i < 10; $i++) {
            DB::table('ingredients')->insert([
                /*
                $table->bigIncrements('');
            $table->string('Nazwa',15);
            $table->decimal('Cena',10,2);
            $table->timestamps();
            $table->softDeletes();
            */
                //Losowe składniki
                'id'=>$i+1,
                'Nazwa' => Str::random(10),
                'Cena' => rand(1, 10),
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
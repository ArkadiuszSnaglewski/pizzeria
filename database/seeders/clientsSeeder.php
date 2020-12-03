<?php

namespace Database\Seeders;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class clientsSeeder extends Seeder
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
            DB::table('clients')->insert([
                'id'=>$i+1,
                // losowe imie
                'Imie' => $faker->firstname,
                // losowe nazwisko
                'Nazwisko' => $faker->lastname,
                // losowa liczba dla numeru telefonu
                'NumerTelefonu' => '+48'.rand(10000000,99999999),
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

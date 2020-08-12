<?php

use App\Raffle;
use Illuminate\Database\Seeder;

class RafflesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

         for ($i = 0; $i < 50; $i++) {
            $begin_date = $faker->date;
             Raffle::create([
                 'name' => $faker->sentence,
                 'benefactor' => $faker->company,
                 'description' => $faker->paragraph,
                 'begin_date' => $begin_date,
                 'end_date' => date('Y-m-d', strtotime($begin_date. ' + 14 days')),
             ]);
        }
    }
}

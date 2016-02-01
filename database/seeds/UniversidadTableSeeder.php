<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Universidad;

class UniversidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $Universidad = new Universidad();

        $Universidad->nombre     = 'Universidad Austral de Chile';

        $Universidad->save();
        for($i = 0; $i < 20; $i++)
        {
            $Universidad = new Universidad();

            $Universidad->nombre     = $faker->name . ' University';

            $Universidad->save();

        }

    }
}

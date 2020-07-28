<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Facker;

class Moderns extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Facker::create();



        for ($i = 0 ; $i<10 ; $i++){

            $array =[
                'title' => $faker->word,
                'post'=>$faker->paragraph,
                'img'=>'1588375052Pf3zxNhrBw.jpg'

            ];
            \App\Models\Modern::create($array);
        }

    }

}

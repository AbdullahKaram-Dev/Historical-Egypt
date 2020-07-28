<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Facker;

class Coptics extends Seeder
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
                'img'=>'1588370315UaJnXydI3V.jpg'
            ];
            \App\Models\Coptic::create($array);
        }
    }
}

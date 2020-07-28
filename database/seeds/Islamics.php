<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Facker;

class Islamics extends Seeder
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
                'img'=>'15884606645PHIJzvk0G.jpg'


            ];
            \App\Models\Islamic::create($array);
        }

    }

}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             Coptics::class,
             Pharaonics::class,
             Moderns::class,
             Islamics::class,
             Homepage::class

         ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class PrincipalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Principal::class, 1)->create();
    }
}

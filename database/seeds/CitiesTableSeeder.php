<?php

use Illuminate\Database\Seeder;
use App\City;
use Maatwebsite\Excel\Facades\Excel;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = resource_path('assets/csv/cities.csv');
        Excel::load($path, function($reader) {
            $cities = $reader->get();
            foreach ($cities as $city) {
                City::create([
                    'name' => $city->name,
                    'country_id' => intval($city->country_id),
                ]);
            }
        });
    }
}

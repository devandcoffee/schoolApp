<?php

use Illuminate\Database\Seeder;
use App\Country;
use Maatwebsite\Excel\Facades\Excel;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = resource_path('assets/csv/countries.csv');
        Excel::load($path, function($reader) {
            $countries = $reader->get();
            foreach ($countries as $country) {
                Country::create([
                    'name' => $country->name
                ]);
            }
        });
    }
}

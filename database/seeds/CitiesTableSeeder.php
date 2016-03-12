<?php

use Illuminate\Database\Seeder;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = storage_path("app/cities.json");
        $json     = \File::get($jsonFile);
        $cities   = json_decode($json);

        foreach($cities as $item) {
            $city       = new City;
            $city->name = $item->name;
            $city->save();

            $this->command->info("Created '".$city->name."' city");
        }
    }
}

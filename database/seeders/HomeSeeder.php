<?php

namespace Database\Seeders;

use App\Imports\HomesImport;
use App\Models\Home;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $csv_path = storage_path('app\public\property-data.csv');

        if (File::exists($csv_path)){
            if (! Home::count()){
                \Excel::import(new HomesImport(), $csv_path);
            }
        }else{
            $homes = [
                [

                    "name" => "The Victoria",
                    "price" => "374662.00",
                    "bedrooms" => 4,
                    "bathrooms" => 2,
                    "storeys" => 2,
                    "garages" => 2,

                ],
                [
                    "name" => "The Xavier",
                    "price" => "513268.00",
                    "bedrooms" => 4,
                    "bathrooms" => 2,
                    "storeys" => 1,
                    "garages" => 2,

                ],
                [
                    "name" => "The Como",
                    "price" => "454990.00",
                    "bedrooms" => 4,
                    "bathrooms" => 3,
                    "storeys" => 2,
                    "garages" => 3
                ],
                [
                    "name" => "The Aspen",
                    "price" => "384356.00",
                    "bedrooms" => 4,
                    "bathrooms" => 2,
                    "storeys" => 2,
                    "garages" => 2,

                ],
                [
                    "name" => "The Lucretia",
                    "price" => "572002.00",
                    "bedrooms" => 4,
                    "bathrooms" => 3,
                    "storeys" => 2,
                    "garages" => 2

                ],
                [
                    "name" => "The Toorak",
                    "price" => "521951.00",
                    "bedrooms" => 5,
                    "bathrooms" => 2,
                    "storeys" => 1,
                    "garages" => 2,
                ],
                [
                    "name" => "The Skyscape",
                    "price" => "263604.00",
                    "bedrooms" => 3,
                    "bathrooms" => 2,
                    "storeys" => 2,
                    "garages" => 2,

                ],
                [
                    "name" => "The Clifton",
                    "price" => "386103.00",
                    "bedrooms" => 3,
                    "bathrooms" => 2,
                    "storeys" => 1,
                    "garages" => 1
                ],
                [
                    "name" => "The Geneva",
                    "price" => "390600.00",
                    "bedrooms" => 4,
                    "bathrooms" => 3,
                    "storeys" => 2,
                    "garages" => 2,

                ]
            ];
            foreach ($homes as $home){
                Home::create($home);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Imports\HomesImport;
use Illuminate\Database\Seeder;

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

        \Excel::import(new HomesImport(), $csv_path);
    }
}

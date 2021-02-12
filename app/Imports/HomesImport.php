<?php


namespace App\Imports;


use App\Models\Home;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HomesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Home|null
     */
    public function model(array $row)
    {
        return new Home([
            'name'     => $row['name'],
            'price'     => $row['price'],
            'bedrooms'     => $row['bedrooms'],
            'bathrooms'     => $row['bathrooms'],
            'storeys'     => $row['storeys'],
            'garages'     => $row['garages'],
        ]);
    }


}
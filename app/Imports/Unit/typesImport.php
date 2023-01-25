<?php

namespace App\Imports\Unit;

use App\Models\type;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class typesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new type([
            'brand_id' => $row['brand'],
            'category_id' => $row['category'],
            'name' => $row['name'],
            'slug' => $row['slug'],
            'description' => $row['description'],
        ]);
    }
}

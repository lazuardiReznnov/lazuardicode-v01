<?php

namespace App\Imports\Unit;

use App\Models\Carosery;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class caroseriesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Carosery([
            'name' => $row['name'],
            'slug' => $row['slug'],
            'description' => $row['description'],
        ]);
    }
}

<?php

namespace App\Imports\Unit;

use App\Models\flag;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class flagsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new flag([
            'name' => $row['name'],
            'slug' => $row['slug'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'address' => $row['address'],
        ]);
    }
}

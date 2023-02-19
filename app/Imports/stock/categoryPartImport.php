<?php

namespace App\Imports\stock;

use App\Models\categoryPart;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class categoryPartImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new categoryPart([
            'name' => $row['name'],
            'slug' => $row['slug'],
            'descriptions' => $row['descriptions'],
        ]);
    }
}

<?php

namespace App\Imports\stock;

use App\Models\sparepart;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class sparepartImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new sparepart([
            'category_part_id' => $row['category'],
            'type_id' => $row['type'],
            'name' => $row['name'],
            'brand' => $row['brand'],
            'slug' => $row['slug'],
            'codePart' => $row['kode'],
        ]);
    }
}

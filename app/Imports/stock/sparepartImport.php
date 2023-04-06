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
            'type_id' => $row['type'],
            'category_part_id' => $row['category'],
            'name' => $row['name'],
            'brand' => $row['brand'],
            'slug' => $row['slug'],
            'codepart' => $row['kode'],
        ]);
    }
}

<?php

namespace App\Imports\Unit;

use App\Models\group;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class groupsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new group([
            'name' => $row['name'],
            'slug' => $row['slug'],
            'description' => $row['description'],
        ]);
    }
}

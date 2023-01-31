<?php

namespace App\Imports\Unit;

use App\Models\unit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class unitsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new unit([
            'type_id' => $row['type'],
            'carosery_id' => $row['carosery'],
            'flag_id' => $row['flag'],
            'group_id' => $row['group'],
            'name' => $row['name'],
            'slug' => $row['slug'],
            'color' => $row['color'],
            'vin' => $row['vin'],
            'engine_numb' => $row['engine'],
            'year' => $row['year'],
            'fuel' => $row['fuel'],
            'cylinder' => $row['cylinder'],
        ]);
    }
}

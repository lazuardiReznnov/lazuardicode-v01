<?php

namespace App\Imports\Unit;

use App\Models\Letter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class lettersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Letter([
            'category_letter_id' => $row['category'],
            'unit_id' => $row['unit'],
            'regNum' => $row['reg'],
            'slug' => $row['slug'],
            'owner' => $row['owner'],
            'owner_add' => $row['add'],
            'reg_year' => $row['year'],
            'loc_code' => $row['loc'],
            'lpc' => $row['lpc'],
            'vodn' => $row['vodn'],
            'tax' => $row['tax'],
            'expire_date' => $row['expire'],
        ]);
    }
}

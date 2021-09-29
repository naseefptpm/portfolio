<?php

namespace App\Imports;

use App\Models\Plots;
use Maatwebsite\Excel\Concerns\ToModel;

class PlotsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Plots([
            //
        ]);
    }
}

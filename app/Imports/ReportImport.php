<?php

namespace App\Imports;

use App\Models\Plots;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ReportImport implements ToModel, WithHeadingRow
{
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

<?php

namespace App\Exports;

use App\Models\Fees;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class MgFeeExport implements FromQuery,WithHeadings
{
    use Exportable;

    public function __construct($year, $calcprd, $id)
    {        
        $this->year = $year;

        $this->calcprd = $calcprd;
        $this->id = $id;
    }
    public function query()
    {
        return Fees::query()->where('portfoliono', '=', $this->id)
                              ->where('year', '=', $this->year)
                              ->where('calcprd', '=', $this->calcprd);
    }

    public function headings(): array {

        return [
            'Id',
            'Portfolio No',
            'Calculation Period',
            'Method',

            'Management Fees',
            

        ];
    }
}

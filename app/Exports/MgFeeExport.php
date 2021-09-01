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

    public function __construct($from, $to, $id)
    {
        $this->from = $from;
        $this->to = $to;
        $this->id = $id;
    }
    public function query()
    {
        return Fees::query()->whereDate('created_at', '>=', $this->from)
                              ->whereDate('created_at', '<=', $this->to)
                              ->where('portfoliono', '=', $this->id);
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

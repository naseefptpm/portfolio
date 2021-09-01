<?php

namespace App\Exports;

use App\Models\Plots;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class FinanceExport implements FromQuery,WithHeadings
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
        return Plots::query()->whereDate('date', '>=', $this->from)
                              ->whereDate('date', '<=', $this->to)
                              ->where('portfoliono', '=', $this->id);
    }

    public function headings(): array {

        return [
            'Id',
            'Portfolio No',
            'Client No',
            'Date',
            'Type',
            'Area Name',
            'Block',
            'Property Value',
            'Finance Amount',
            'PAI Rent',
            'Licensed Purpose',
            'Application No',
            'Plot Area Size',
            'PAI LC Issue',
            'PAI LC Expiry',
            'PAI LC Attachment',
            'Fire Insurance Issue',
            'Fire Insurance Expiry',
            'Fire Insurance Attachment',
            'Fire License Issue',
            'Fire License Expiry',
            'Fire License Attachment',
            'POA MOJ Issue',
            'POA MOJ Expiry',
            'POA MOJ Issued To',
            'POA Warba Issue',
            'POA Warba Expiry',
            'POA Warba Issued To',
            'Email Attachment New Deal',
            'Email Attachment POA',


        ];
    }

}

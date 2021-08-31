<?php

namespace App\Exports;

use App\Models\Plots;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return Plots::all();
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

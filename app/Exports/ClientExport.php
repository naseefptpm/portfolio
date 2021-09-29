<?php

namespace App\Exports;

use App\Models\Clients;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;


class ClientExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function collection()
    {
        return Clients::all();
    }

 

    public function headings(): array {

        return [
            'id',
            'clientname',
            'clientaddress',
            'clienttelephone',
            'clientemail',
            'clientidtype',
            'clientidno',
            'clientidexpdate',
        ];
    }
}

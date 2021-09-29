<?php

namespace App\Imports;

use App\Models\Clients;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToModel, WithHeadingRow 
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Clients([
            'id' => $row['id'],

           'clientname' => $row['clientname'],
           'clientaddress' => $row['clientaddress'],
           'clienttelephone' => $row['clienttelephone'],
           'clientemail' => $row['clientemail'],
           'clientidtype' => $row['clientidtype'],
           'clientidno' => $row['clientidno'],
           'clientidexpdate' => $row['clientidexpdate'],





        ]);
    }
}

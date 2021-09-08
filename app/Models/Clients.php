<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{

    // public function plots()
    // {
    //     return $this->belongsTo('App\Models\Plots', 'clientno');
    // }
    use HasFactory;
    protected $fillable = [
        'clientname',
        'clientaddress',
        'clienttelephone',
        'clientemail',
        'clientidtype',
        'clientidno',
        'clientidexpdate',
        

       
    ];

}

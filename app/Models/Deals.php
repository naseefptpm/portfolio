<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Deals extends Model
{
    use SoftDeletes; 
    
    protected $fillable = [
        'portfoliono',
        'clientno',
        'plotno',
        'date',
        'type',


        
        

       
    ];
}

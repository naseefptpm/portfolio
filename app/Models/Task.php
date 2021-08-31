<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes; 
    
    protected $fillable = [
        'taskdesc',
        'portfolio',
        'client',
        'plot',
        'doctype',
        'duedate',
       
        

       
    ];
}

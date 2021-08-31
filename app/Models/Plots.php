<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Plots extends Model
{
    use SoftDeletes; 
    
    protected $fillable = [
        'portfoliono',
        'clientno',
        'date',
        'type',
        'areaname',
        'block',
        'propertyvalue',
        'financeamount',
        'pairent',
        'licensedpurpose',
        'applicationno',
        'plotareasize',
        'pai_lc_issue',
        'pai_lc_expiry',
        'pai_lc_attach',
        'fi_issue',
        'fi_expiry',
        'fi_attach',
        'fl_issue',
        'fl_expiry',
        'fl_attach',
        'poa_moj_issue',
        'poa_moj_expiry',
        'poa_moj_issued_to',
        'poa_warba_issue',
        'poa_warba_expiry',
        'poa_warba_issued_to',
        'email_attach_newdeal',
        'email_attach_poa',
        
        

       
    ];
}

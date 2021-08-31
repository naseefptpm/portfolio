<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Renewal extends Model
{
    use SoftDeletes; 
    
    protected $fillable = [
    'reportfoliono',
    'reclientno',
    'replotno',
    'repai_lc_issue',
    'repai_lc_expiry',
    'repai_lc_attach',
    'refi_issue',
    'refi_expiry',
    'refi_attach',
    'refl_issue',
    'refl_expiry',
    'refl_attach',
    'repoa_moj_issue',
    'repoa_moj_expiry',
    'repoa_moj_issued_to',
    'repoa_warba_issue',
    'repoa_warba_expiry',
    'repoa_warba_issued_to',
    'reemail_attach_newdeal',
    'reemail_attach_poa',];
}

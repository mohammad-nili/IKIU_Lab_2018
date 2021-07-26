<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'result';

    protected $fillable =[
        'request_id','registration_request_code','fee','bill_num','transfer_date',
        'response_date','received_items','reception_sign',
    ];

    public function request(){
        return $this->belongsTo(Request::class,'request_id');
    }
}

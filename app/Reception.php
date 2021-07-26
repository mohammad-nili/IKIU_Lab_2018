<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    protected $table = 'reception';

    protected $fillable =[
        'request_id','sample_count','reception_status','failed_reception_cause',
        'exam_code','transfer_date','transfer_method','total_cost','discount',
        'discount_type', 'payment','payment_method','payment_status', 'tracking_code',
    ];

    public function request(){
        return $this->belongsTo(Request::class,'request_id');
    }
}

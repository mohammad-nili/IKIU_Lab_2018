<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answer';

    protected $fillable =[
        'request_id','certificate_num','transfer_date',
        'transfer_method','transferee','factor_num',
    ];

    public function request(){
        return $this->belongsTo(Request::class,'request_id');
    }
}

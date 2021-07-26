<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestExam extends Model
{
    protected $table = 'request_exam';

    protected $fillable =[
        'exam_id','request_id',
    ];
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachment';

    protected $fillable =[
        'request_id','request_id','recommend','reference','reference_num',
        'structure','structure_num','degree','degree_num',
    ];

    public function request(){
        return $this->belongsTo(Request::class,'request_id');
    }
}

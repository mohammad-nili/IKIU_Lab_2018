<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $table = 'sample';

    protected $fillable =[
        'request_id','type'
    ];

    public function request(){
        return $this->belongsTo(Request::class,'request_id');
    }

    public function sample_attr(){
        return $this->hasMany(Sample_attr::class,'sample_id');
    }
}

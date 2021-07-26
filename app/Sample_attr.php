<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample_attr extends Model
{
    protected $table = 'sample_attr';

    protected $fillable =[
        'sample_id','name','value'
    ];

    public function sample(){
        return $this->belongsTo(Sample::class,'sample_id');
    }
}

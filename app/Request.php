<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'request';

    protected $fillable =[
        'user_id','status','wait_for','request_type','P_N','IN_OUT','plump','request_description','test_condition','storage_time',
        'legal_person','natural_person','failed_request_cause','suggest_method',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function exam(){
        return $this->belongsToMany(Exam::class);
    }
    public function attachment(){
        return $this->hasMany(Attachment::class,'request_id');
    }
    public function sample(){
        return $this->hasMany(Sample::class,'request_id');
    }
    public function result(){
        return $this->hasOne(Result::class,'request_id');
    }
    public function answer(){
        return $this->hasOne(Answer::class,'request_id');
    }
    public function reception(){
        return $this->hasOne(Reception::class,'request_id');
    }
}

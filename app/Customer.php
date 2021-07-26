<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable =[
        'user_id','national_number','job','dependency','phone_number','landline_number','fax','grade','professor_name',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}

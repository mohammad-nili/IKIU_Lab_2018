<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table = 'role_permissions';

    protected $fillable =['name', 'name_fa', 'image', 'ADD_USER', 'EDIT_USER', 'ADD_EXAM', 'EDIT_EXAM', 'PAYMENT',];

    public function user(){
        return $this->hasMany(User::class,'role');
    }
}

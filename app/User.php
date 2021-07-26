<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const Root         =   'root';
    const Customer     =   'customer';
    const Boss_lab     =   'boss_lab';
    const Boss_uni     =   'boss_uni';
    const Manager      =   'manager';
    const Expert       =   'expert';
    const Reception    =   'reception';

    protected $fillable = [
        'name', 'email', 'password','roll',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function customer(){
        return $this->hasOne(Customer::class);
    }

    public function request(){
        return $this->hasMany(Request::class,'user_id');
    }
    public function RolePermission(){
        return $this->belongsTo(RolePermission::class,'role');
    }

    public function isBoss()
    {
        if ($this->role == 2 || $this->role == 3 || $this->role == 4) {
            return true;
        }
        return false;
    }
    public function isCustomer()
    {
        if ($this->role == 1) {
            return true;
        }
        return false;
    }
     public function NotCustomer()
    {
        if ($this->role == 1) {
            return false;
        }
        return true;
    }
    public function Register_customer()
    {
        if (isset($this->customer)) {
            return true;
        }
        return false;
    }
    public function isManager()
    {
        if ($this->role == 5) {
            return true;
        }
        return false;
    }
    public function isExpert()
    {
        if ($this->role == 6) {
            return true;
        }
        return false;
    }
    public function isReception()
    {
        if ($this->role == 7) {
            return true;
        }
        return false;
    }

}

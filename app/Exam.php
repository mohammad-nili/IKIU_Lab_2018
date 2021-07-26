<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exam';
    protected $fillable =['name', 'cost', 'category','description'];

    public function request(){
        return $this->belongsToMany(Request::class);
    }

    const Chemical       =   'شیمی';
    const Rock_MECHABICS =   'مکانیک سنگ';
    const Agriculture =   'کشاورزی';
    const Physics =   'فیزیک';
    const Metallurgy =   'مواد متالوژی';
    const Metal_Shaping =   'شکل دهی فلزات';
    const Mineral_Shaping =   'کانه آرایی';
    const Pro_Metallurgy =   'مواد پیشرفته';
    const Irrigation =   'مکانیک سیالات و آبیاری';
    const Soil_Mechanics =   'مکانیک خاک';
    const Geology =   'زمین شناسی';

    //
//    public function attr(){
//        return $this->hasMany(Request::class,'exam_id');
//    }

}

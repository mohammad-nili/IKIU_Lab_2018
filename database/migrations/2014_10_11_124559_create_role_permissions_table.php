<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('name_fa')->unique();
            $table->string('image');
            $table->boolean('REQUEST');
            $table->boolean('ADD_USER');
            $table->boolean('EDIT_USER');
            $table->boolean('ADD_EXAM');
            $table->boolean('EDIT_EXAM');
            $table->boolean('PAYMENT');
            $table->timestamps();
        });
        DB::table('role_permissions')->insert(['name' => 'customer', 'name_fa' => 'متقاضی', 'image' => '/images/character/customer.png', 'REQUEST' => 1, 'ADD_USER' => 0, 'EDIT_USER' => 0, 'ADD_EXAM' => 0, 'EDIT_EXAM' => 0, 'PAYMENT' => 0,]);
        DB::table('role_permissions')->insert(['name' => 'root', 'name_fa' => 'root', 'image' => '/images/character/manager.png', 'REQUEST' => 0, 'ADD_USER' => 1, 'EDIT_USER' => 1, 'ADD_EXAM' => 1, 'EDIT_EXAM' => 1, 'PAYMENT' => 1,]);
        DB::table('role_permissions')->insert(['name' => 'boss_lab', 'name_fa' => 'ریٔیس آزمایشگاه', 'image' => '/images/character/boss_lab.png', 'REQUEST' => 0, 'ADD_USER' => 1, 'EDIT_USER' => 1, 'ADD_EXAM' => 1, 'EDIT_EXAM' => 1, 'PAYMENT' => 1,]);
        DB::table('role_permissions')->insert(['name' => 'boss_uni', 'name_fa' => 'ریٔیس دانشکده', 'image' => '/images/character/boss_uni.png', 'REQUEST' => 0, 'ADD_USER' => 1, 'EDIT_USER' => 1, 'ADD_EXAM' => 1, 'EDIT_EXAM' => 0, 'PAYMENT' => 1,]);
        DB::table('role_permissions')->insert(['name' => 'manager', 'name_fa' => 'مدیر فنی(مدیر گروه)', 'image' => '/images/character/manager.png', 'REQUEST' => 0, 'ADD_USER' => 0, 'EDIT_USER' => 0, 'ADD_EXAM' => 1, 'EDIT_EXAM' => 0, 'PAYMENT' => 1,]);
        DB::table('role_permissions')->insert(['name' => 'expert', 'name_fa' => 'کارشناس آزمایشگاه', 'image' => '/images/character/expert.png', 'REQUEST' => 0, 'ADD_USER' => 0, 'EDIT_USER' => 0, 'ADD_EXAM' => 1, 'EDIT_EXAM' => 0, 'PAYMENT' => 1,]);
        DB::table('role_permissions')->insert(['name' => 'reception', 'name_fa' => 'دفتر آزمایشگاه مرکزی', 'image' => '/images/character/reception.png', 'REQUEST' => 0, 'ADD_USER' => 0, 'EDIT_USER' => 0, 'ADD_EXAM' => 1, 'EDIT_EXAM' => 0, 'PAYMENT' => 1,]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_permissions');
    }
}

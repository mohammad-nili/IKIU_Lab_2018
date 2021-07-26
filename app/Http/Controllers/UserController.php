<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class UserController extends Controller
{
    public function show()
    {
        $users = \App\User::all()->whereNotIn('role',2);
        return view('layouts.users.show',compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $customer = Customer::find($id);
        $role = \App\RolePermission::find($user->role)->name_fa;
        return view('layouts.users.edit',compact('user','customer','role'));
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);
        if ($request->input('select_role') != $user->role) {
            User::where("id", $id)->Update(["role" => $request->input('select_role')]);
            if ($request->input('select_cluster') != $user->cluster) {User::where("id", $id)->Update(["cluster" => $request->input('select_cluster')]);alert()->success('دسترسی کاربر مورد نظر تغییر یافت', 'تغییر منصب و گروه')->autoclose(3500);}
            else{alert()->success('دسترسی کاربر مورد نظر تغییر یافت', 'تغییر منصب')->autoclose(3500);}
            return redirect()->route('ShowUsers');
        } else {
            if ($request->input('select_cluster') != $user->cluster) {User::where("id", $id)->Update(["cluster" => $request->input('select_cluster')]);alert()->success('دسترسی کاربر مورد نظر تغییر یافت', 'تغییر گروه')->autoclose(3500);}
            else{alert()->info('بدون تغییر', 'تغییر منصب')->autoclose(3500);}
            return redirect()->route('ShowUsers');
        }
    }
    public function create()
    {
        return view('layouts.users.add');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'      => 'required',
            'cluster'   => 'required',
            'email'     => 'required|email|unique:users',
            'role'      => 'required',
            'password'  => 'required|confirmed',

        ]);
        $user = new User();
        $user->name = $request->name;
        $user->cluster = $request->cluster;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        alert()->success('کاربر جدید با موفقیت ثبت نام شد', 'ثبت نام')->autoclose(3500);
        return redirect()->route('ShowUsers');
    }
}

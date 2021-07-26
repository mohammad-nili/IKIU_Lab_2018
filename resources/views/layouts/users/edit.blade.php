@extends('home')

@section('style')
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            color: #000;
        }
        .table-wrapper {
            box-shadow: 0 0 10px #2b2b2b;
            border-radius: 10px;
            overflow: hidden;
        }

        td, th {
            border: 1px solid rgba(255, 191, 67, 0.5);
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #ddddc1;
        }
        .table-wrapper a{color: black;}
        .table-wrapper a:hover{color: red;}
    </style>
@endsection
@section('content')


    <div class="table-wrapper" style="margin-bottom: 10px">
        <form action="{{route('UpdateUser',$user->id)}}" method="POST">
            @csrf
            @method('PATCH')
        <table>
            <thead style="background-color: #ffd134">
            <tr>
                <td>نام کاربری</td>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <td>منصب</td>
                <td>
                    <select name="select_role">
                        <option value="1" @if($user->cluster == '') selected @endif>متقاضی</option>
                        <option value="3" @if($role == 'ریٔیس آزمایشگاه') selected @endif>ریٔیس آزمایشگاه</option>
                        <option value="4" @if($role == 'ریٔیس دانشکده') selected @endif>ریٔیس دانشکده</option>
                        <option value="5" @if($role == 'مدیر فنی(مدیر گروه)') selected @endif>مدیر فنی(مدیر گروه)</option>
                        <option value="6" @if($role == 'کارشناس آزمایشگاه') selected @endif>کارشناس آزمایشگاه</option>
                        <option value="7" @if($role == 'دفتر آزمایشگاه') selected @endif>دفتر آزمایشگاه</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>گروه</td>
                <td>
                    <select name="select_cluster">
                        <option value="شیمی" @if($user->cluster == 'شیمی') selected @endif>شیمی</option>
                        <option value="مکانیک سنگ" @if($user->cluster == 'مکانیک سنگ') selected @endif>مکانیک سنگ</option>
                        <option value="کشاورزی" @if($user->cluster == 'کشاورزی') selected @endif>کشاورزی</option>
                        <option value="فیزیک" @if($user->cluster == 'فیزیک') selected @endif>فیزیک</option>
                        <option value="مواد متالوژی" @if($user->cluster == 'مواد متالوژی') selected @endif>مواد متالوژی</option>
                        <option value="شکل دهی فلزات" @if($user->cluster == 'شکل دهی فلزات') selected @endif>شکل دهی فلزات</option>
                        <option value="کانه آرایی" @if($user->cluster == 'کانه آرایی') selected @endif>کانه آرایی</option>
                        <option value="مواد پیشرفته" @if($user->cluster == 'مواد پیشرفته') selected @endif>مواد پیشرفته</option>
                        <option value="مکانیک سیالات و آبیاری" @if($user->cluster == 'مکانیک سیالات و آبیاری') selected @endif>مکانیک سیالات و آبیاری</option>
                        <option value="مکانیک خاک" @if($user->cluster == 'مکانیک خاک') selected @endif>مکانیک خاک</option>
                        <option value="زمین شناسی" @if($user->cluster == 'زمین شناسی') selected @endif>زمین شناسی</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ایمیل</td>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <td>تاریخ عضویت</td>
                <td>{{$user->created_at->format('d / m / Y')}}</td>
            </tr>
            @if($role=='متقاضی')
                <tr>
                    <td>کد ملی</td>
                    <td>{{$customer->national_number}}</td>
                </tr>
                <tr>
                    <td>شغل</td>
                    <td>{{$customer->job}}</td>
                </tr>
                <tr>
                    <td>نام دانشگاه/شرکت/موسسه وابسته:</td>
                    <td>{{$customer->dependency}}</td>
                </tr>
                <tr>
                    <td>تلفن:</td>
                    <td>{{$customer->phone_number}}</td>
                </tr>
                <tr>
                    <td>تلفن ثابت:</td>
                    <td>{{$customer->landline_number}}</td>
                </tr>
                <tr>
                    <td>نمابر:</td>
                    <td>{{$customer->fax}}</td>
                </tr>
                <tr>
                    <td>مقطع تحصیلی:</td>
                    <td>{{$customer->grade}}</td>
                </tr>
                <tr>
                    <td>نام استاد راهنما:</td>
                    <td>{{$customer->professor_name}}</td>
                </tr>
            @endif
            </thead>
        </table>
            <button type="submit" style="cursor: pointer;height: 40px;width: 100%;background-color: rgba(37,117,42,0.81);text-align: center;padding: 5px;margin: 5px auto;display: block;border-radius: 5px">
                <i style="color: white" class="material-icons">done</i>
            </button>
            <a href="{{route('ShowUsers')}}" style="cursor: pointer;height: 40px;width: 100%;background-color: rgba(109,1,0,0.8);text-align: center;padding: 5px;margin: 5px auto;display: block;border-radius: 5px">
                <i style="color: white" class="material-icons">clear</i>
            </a>
        </form>
    </div>

@endsection

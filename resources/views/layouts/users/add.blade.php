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

    @if ($errors->any())
        <script>
            swal("خطا", "@foreach ($errors->all() as $error){{$error.'\n'}}@endforeach", "error");
        </script>
    @endif
    @if(Session::has('sweet_alert.alert'))
        <script>
            swal({!! Session::get('sweet_alert.alert') !!});
        </script>
        {{--@endif--}}
    @endif

    <div class="table-wrapper" style="margin-bottom: 10px">
        <form action="{{route('AddUser')}}" method="POST">
            @csrf
            <table>
                <thead style="background-color: #ffd134">
                <tr>
                    <td>نام کاربری</td>
                    <td><input name="name" required type="text" placeholder="( مثال : علی علوی )"></td>
                </tr>
                <tr>
                    <td>منصب</td>
                    <td>
                        <select name="role">
                            <option value="1">متقاضی</option>
                            <option value="3">ریٔیس آزمایشگاه</option>
                            <option value="4">ریٔیس دانشکده</option>
                            <option value="5">مدیر فنی(مدیر گروه)</option>
                            <option value="6">کارشناس آزمایشگاه</option>
                            <option value="7">دفتر آزمایشگاه</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>گروه</td>
                    <td>
                        <select name="cluster">
                            <option value="شیمی">شیمی</option>
                            <option value="مکانیک سنگ">مکانیک سنگ</option>
                            <option value="کشاورزی">کشاورزی</option>
                            <option value="فیزیک">فیزیک</option>
                            <option value="مواد متالوژی">مواد متالوژی</option>
                            <option value="شکل دهی فلزات">شکل دهی فلزات</option>
                            <option value="کانه آرایی">کانه آرایی</option>
                            <option value="مواد پیشرفته">مواد پیشرفته</option>
                            <option value="مکانیک سیالات و آبیاری">مکانیک سیالات و آبیاری</option>
                            <option value="مکانیک خاک">مکانیک خاک</option>
                            <option value="زمین شناسی">زمین شناسی</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>ایمیل</td>
                    <td><input name="email" required type="email" placeholder="( مثال : sample@gmail.com )"></td>
                </tr>
                <tr>
                    <td>گذر واژه</td>
                    <td><input name="password" required type="password"></td>
                </tr>
                <tr>
                    <td>تکرار گذر واژه</td>
                    <td><input name="password_confirmation" required type="password"></td>
                </tr>
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

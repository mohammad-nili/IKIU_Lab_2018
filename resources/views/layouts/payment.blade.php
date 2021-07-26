@extends('home')
@section('style')
    <link rel="stylesheet" href="css/custom_table.css">
    <style>
        .table-wrapper  a{color: black;}
        .table-wrapper  a:hover{color: red;}
        .buttom{
            margin: 5px;
            padding: 10px;
            border: 1px solid #FFBF43;
            color: #ffefa3;
            background-color: #1a1a1a;
            box-shadow: 0 0 5px #1a1a1a;
            border-radius: 5px;
        }
    </style>
@endsection
@section('content')


    @if(Session::has('sweet_alert.alert'))
        <script>
            swal({!! Session::get('sweet_alert.alert') !!});
        </script>
    @endif
    <form enctype="multipart/form-data" method="get" action="{{route('payments')}}" style="text-align: center;border-radius: 15px;margin: 15px;padding: 15px">
        <span>فیلتر بندی نتایج :</span>
        <select class="buttom" name="pay_date">
            <option value="all">همه پرداخت ها</option>
            <option value="month">ماه گدشته</option>
            <option value="week">هفته گدشته</option>
            <option value="day">امروز</option>
        </select>
        <select class="buttom" name="pay_category">
            <option value="all">همه دسته بندی ها</option>
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
        <input class="buttom" type="submit" value="✓">
    </form>

    <div class="table-wrapper" style="margin-bottom: 10px">

        <table>
            <thead style="background-color: #ffd134">
            <th>درخواست کننده</th>
            <th>نام آزمون</th>
            <th>گروه آزمون</th>
            <th>هزینه (ریال)</th>
            <th>پرداختی (ریال)</th>
            <th>تاریخ پرداخت</th>
            </thead>
            <tbody id="table">
            @foreach($payments as $payment)
                <tr>
                    <td class="obname">{{$payment->request->user->name}}</td>
                    <td class="obname">{{$payment->request->Name}}</td>
                    <td class="obname">{{$payment->request->cluster}}</td>
                    <td class="obname">{{number_format($payment->total_cost)}}</td>
                    <td class="obname">{{number_format($payment->payment)}}</td>
                    <td class="obname">{{$payment->updated_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>

@endsection

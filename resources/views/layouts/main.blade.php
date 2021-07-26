@extends('home')

@section('content')

    @if(Session::has('pay_alert'))
        {!! Session::get('pay_alert') !!}
    @endif
    {{--@if(auth()->user()->role=='expert')--}}
        @if(Session::has('sweet_alert.alert'))
            <script>
                swal({!! Session::get('sweet_alert.alert') !!});
            </script>
        {{--@endif--}}
    @endif
    <div style="background-color: #51c6ff;padding: 5px;border-radius: 5px;box-shadow: 0 0 15px #1a1a1a;float: left;direction: rtl;text-align: right">
        <div style="color: #c51f1a;font-size: 18px;margin: 5px">اطلاعیه ها</div>
    @if(\App\RolePermission::find(auth()->user()->role)->name == \App\User::Customer)
        @if(!isset(auth()->user()->customer))
            <li style="cursor: text;color: #000000;font-size: 18px;margin: 15px">جهت درخواست آزمون باید اطلاعات فردی خود را تکمیل نمایید.برای تکمیل اطلاعات خود به لینک زیر مراجعه کنید.</li>
            <li style="cursor: text;color: #000000;font-size: 18px;margin: 15px">
                <a style="color: #c51f1a" href="{{route('RS0_show')}}">تکمیل اطلاعات فردی</a>
            </li>
            <script>
                swal("", "برای درخواست آزمون باید اطلاعات خود را تکمیل کنید", "info");
            </script>
        @endif
            <li style="cursor: text;color: #000000;font-size: 18px;margin: 15px">هم اکنون میتوانید به صورت الکترونیکی آزمایش های خود را درخواست نمایید و هزینه آن را به صورت اینترنتی پرداخت نمایید.</li>
    @endif
    </div>
@endsection
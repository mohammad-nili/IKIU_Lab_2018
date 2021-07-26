@extends('home')
@section('style')
    <style>

        table {
            font-size: 1vw;
            width: 100%;
            color: black;
            border-collapse: collapse;
        }

        table, td {
            text-align: right;
            padding-right: 10px;
            border: 1px solid black;
        }
        input[type=radio] {
            margin-right: 5px;
            cursor: pointer;
            font-size: 14px;
            width: 15px;
            height: 12px;
            position: relative;
        }

        input[type=radio]:after {
            position: absolute;
            width: 10px;
            height: 15px;
            border: 1px black solid;
            box-shadow: 3px 3px #000000;
            top: 0;
            content: " ";
            background-color: #ffffff;
            color: #4169e1;
            display: inline-block;
            visibility: visible;
            padding: 0 3px;
            border-radius: 3px;
        }

        input[type=radio]:checked:after {
            content: "✓";
            font-weight: bold;
            font-size: 12px;
        }
        .table-2,.table-3,.table-4,.table-5,.table-6,.table-9{
            margin: 10px 0;
        }
        .table-2 td,.table-3 td,.table-5 td,.table-6 td,.table-7 td,.table-8 td,.table-9 td{
            border: none;
        }
        .table-9 td{
            border-left: 1px solid black;
            text-align: center;
        }
        input[type="radio"] {
            -webkit-appearance: checkbox; /* Chrome, Safari, Opera */
            -moz-appearance: checkbox;    /* Firefox */
            -ms-appearance: checkbox;     /* not currently supported */
        }
        input[type=text] , input[type=tel] , input[type=number] , input[type=email] {
            color: #4169e1;
            margin: 0;
            border-radius: 4px;
            border: 1px solid #757575;
            padding: 5px;align-self: center;min-width: 80px;max-width: 500px;
            float: left;
        }
        .no_m_g{
            margin: 0;padding: 0;
        }
        .no_m_g > input[type=text]{
            border: none;
        }
        .sheet_title{
            display: block;
            width: 200px;
            font-size: 19px;
            border: 2px solid black;
            color: black;
            font-weight: bold;
            padding: 5px 50px;
            margin: 0 auto;
        }
        .sheet_header{
            color: black;margin: 0 auto;font-weight: bold;font-size: 14px
        }
    </style>
@endsection
@section('content')

    @if ($errors->any())
        <script>
            swal("پر کردن فیلد های زیر الزامی است", "@foreach ($errors->all() as $error){{$error.'\n'}}@endforeach", "error");
        </script>
    @endif

    @if(Session::has('sweet_alert.alert'))
        <script>
            swal({!! Session::get('sweet_alert.alert') !!});
        </script>
    @endif

    <div style="background-color: white;padding: 35px;display: block">

        <form enctype="multipart/form-data" name="main_form" onsubmit="return validateForm()" method="post" action="{{route('RS0')}}">
            {!! csrf_field() !!}

            {{--table 1--}}
            {{--مشخصات مشتری--}}
            <table>
                <tr>
                    <th rowspan="5" style="width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مشخصات مشتری</span></th>
                    <td style="flex: 1">
                        <span style="flex: 1">نام و نام خانوادگی:</span>
                        <input type="text" name="FL_name" required  value="{{old('FL_name') ?? auth()->user()->name}}">
                    </td>
                    <td style="flex: 1">
                        <span>شغل:</span>
                        <input type="text"  name="job" required  value="{{old('job')}}" placeholder="( مثال : کارمند/ دانشجو )">
                    </td>
                </tr>
                <tr>
                    <td style="flex: 1">
                        <span>کد ملی:</span>
                        <input type="text"  pattern="[0-9]{10}" name="national_number" required value="{{old('national_number')}}" placeholder="( مثال : 00154... )" oninvalid="this.setCustomValidity('صفحه کلید خود را به زبان انگلیسی تغییر دهید')">
                    </td>
                    <td style="flex: 1">
                        <span>نام دانشگاه/شرکت/موسسه وابسته:</span>
                        <input type="text" name="dependency" required  value="{{old('dependency')}}" placeholder="( مثال : دانشگاه بین المللی امام خمینی )" >
                    </td>
                </tr>
                <tr>
                    <td style="flex: 1">
                        <span>تلفن همراه:</span>
                        <input type="text" pattern="[0]{1}[9]{1}[0-9]{9}" name="phone_number" required value="{{old('phone_number')}}" placeholder="( مثال : ...0912 )" oninvalid="this.setCustomValidity('صفحه کلید خود را به زبان انگلیسی تغییر دهید')">
                    </td>
                    <td style="flex: 1">
                        <span>تلفن ثابت:</span>
                        <input type="text" pattern="[0-9]{8,12}" name="landline_number" required value="{{old('landline_number')}}" placeholder="(  همراه پیش شماره شهر خود : ... )" oninvalid="this.setCustomValidity('صفحه کلید خود را به زبان انگلیسی تغییر دهید')">
                    </td>
                </tr>
                <tr>

                    <td style="flex: 1">
                        <span>نمابر:</span>
                        <input type="text" pattern="[0-9]{8,12}" name="fax" value="{{old('fax')}}" placeholder="( مثال : ...028 )" oninvalid="this.setCustomValidity('صفحه کلید خود را به زبان انگلیسی تغییر دهید')">
                    </td>
                    <td style="flex: 1">
                        <span>پست الکترونیکی:</span>
                        <input type="email" name="email" required value="{{old('email') ?? auth()->user()->email}}" placeholder="( مثال : @ )">
                    </td>
                </tr>
                <tr>
                    <td style="flex: 1">
                        <span>مقطع تحصیلی(دانشجویان):</span>
                        <input type="text" name="grade" value="{{old('grade')}}" placeholder="( مثال : کارشناسی )" style="color: #4169e1">
                    </td>
                    <td style="flex: 1">
                        <span>نام استاد راهنما(دانشجویان):</span>
                        <input type="text" name="professor_name" value="{{old('professor_name')}}" placeholder="( مثال : دکتر... )" style="color: #4169e1">
                    </td>
                </tr>
            </table>
            <input type="submit" value="" style="background: url({{asset('/images/icon/check.png')}}) no-repeat center center;cursor: pointer;height: 40px;width: 100%;background-color: #757575;text-align: center;margin: 10px auto;display: block;border-radius: 5px">

        </form>
    </div>

@endsection
@section('scripts')
    <script src="/js/input.js"></script>
    <script>
        let inputs = document.getElementsByTagName('input');
        inputs = Array.from(inputs);
        inputs.map(i => {
            if(i.type === 'text'){
                i.setAttribute('maxLength', 50)
            }
        })
    </script>
@endsection
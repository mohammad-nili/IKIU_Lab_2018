@extends('home')
@section('style')
    <style>

        table {
            text-align: right;
            font-size: 1.5vw;
            color: black;
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            border: 1px solid black;
        }

        table  td {
            padding: 10px;
            border: 1px solid black;
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
        input[type=text] {
            color: #4169e1;
            margin: 0;
            border-radius: 4px;
            border: 1px solid #757575;
            padding: 5px;align-self: center;min-width: 80px;max-width: 500px;
        }
        .no_m_g{
            margin: 0;padding: 0;
        }
        .no_m_g > input[type=text]{
            border: none;
        }
        .sheet_title{
            display: block;
            font-size: 19px;
            border: 2px solid black;
            color: black;
            font-weight: bold;
            padding: 5px 50px;
            margin: 25px auto;
        }
    </style>
    <script>
        function validateForm() {

            var form = document.forms["main_form"];

            for(var i=0 ; i<=9 ;i++) {
                if (
                    (form["sample_name"+i].value !=""&&
                     form["sample_code"+i].value !=""&&
                     form["sample_core"+i].value !=""&&
                     form["sample_solvent"+i].value !=""&&
                     form["sample_condition"+i].value !="") || (form["sample_name"+i].value ==""&&
                     form["sample_code"+i].value ==""&&
                     form["sample_core"+i].value ==""&&
                     form["sample_solvent"+i].value ==""&&
                     form["sample_condition"+i].value =="")
                    ){}else {
                    swal("مشکل در اطلاعات نمونه ها", "اطلاعات هر نمونه باید کامل   پر شود", "error");
                    return false;
                    }
            }
        }

    </script>
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


        <form enctype="multipart/form-data" name="main_form" onsubmit="return validateForm()" method="post" action="{{route('request')}}">
            {!! csrf_field() !!}

        <div style="text-align: center">
            <span class="sheet_title">درخواست آزمون NMR</span>
        </div>


        {{--table 0--}}
        {{--مشخصات مشتری--}}
        <table>
            <tr>
                <th rowspan="5" style="width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مشخصات مشتری</span></th>
                <td style="flex: 1">
                    <span style="flex: 1">نام و نام خانوادگی:</span>
                    <span style="flex: 1;color: #4169e1;">{{$user->FL_name}}</span>
                </td>
                <td style="flex: 1">
                    <span>شغل:</span>
                    <span style="flex: 1;color: #4169e1;">{{$user->job}}</span>
                </td>
            </tr>
            <tr>
                <td style="flex: 1">
                    <span>کد ملی:</span>
                    <span style="flex: 1;color: #4169e1;">{{$user->national_number}}</span>
                </td>
                <td style="flex: 1">
                    <span>نام دانشگاه/شرکت/موسسه وابسته:</span>
                    <span style="flex: 1;color: #4169e1;">{{$user->dependency}}</span>
                </td>
            </tr>
            <tr>
                <td style="flex: 1">
                    <span>تلفن همراه:</span>
                    <span style="flex: 1;color: #4169e1;">{{$user->national_number}}</span>
                </td>
                <td style="flex: 1">
                    <span>تلفن ثابت:</span>
                    <span style="flex: 1;color: #4169e1;">{{$user->phone_number}}</span>
                </td>
            </tr>
            <tr>

                <td style="flex: 1">
                    <span>نمابر:</span>
                    <span style="flex: 1;color: #4169e1;">{{$user->landline_number}}</span>
                </td>
                <td style="flex: 1">
                    <span>پست الکترونیکی:</span>
                    <span style="flex: 1;color: #4169e1;">{{$user->fax}}</span>
                </td>
            </tr>
            <tr>
                <td style="flex: 1">
                    <span>مقطع تحصیلی(دانشجویان):</span>
                    <span style="flex: 1;color: #4169e1;">{{$user->grade}}</span>
                </td>
                <td style="flex: 1">
                    <span>نام استاد راهنما(دانشجویان):</span>
                    <span style="flex: 1;color: #4169e1;">{{$user->professor_name}}</span>
                </td>
            </tr>
        </table>

        {{--table 1--}}
        {{--داخلی خارجی--}}
        <table>
            <tr>
                <th style="height: 150px;width: 60px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">نوع آزمون</span></th>
                <td style="flex: 1">
                    <span style="margin: 0 15px">داخلی<input type="radio" checked name="exam_type" value="داخلی"></span>
                    <span style="margin: 0 15px">خارجی<input type="radio" name="exam_type" value="خارجی"></span>
                </td>
            </tr>
        </table>

        {{--table 2--}}
        {{--درخواست مشتری--}}
        <table class="table-2">
            <tr>
                <th rowspan="5" style="width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">درخواست مشتری</span></th>
                <td>
                    <span style="margin: 0 15px">آزمون<input type="radio" checked name="customer_req" value="آزمون"></span>
                    <span style="margin: 0 15px">آماده سازی<input type="radio" name="customer_req" value="آماده سازی"></span>
                    <span style="margin: 0 15px">استفاده از تجهیزات جانبی<input type="radio" name="customer_req" value="استفاده از تجهیزات جانبی"></span>
                    <span style="margin: 0 15px">عودت باقی ماند نمونه<input type="radio" name="customer_req" value="عودت باقی ماند نمونه"></span>
                    <span style="margin: 0 15px">صدور فاکتور<input type="radio" name="customer_req" value="صدور فاکتور"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="width: 50%;min-width: 50%"><i style="color: red">*</i> شرایط خاص نمونه(نگهداری،حمل و نقل،انبارش):</span>
                    <input type="text" class="width-dynamic proba dva" name="test_condition" value="{{old('grade')}}" placeholder="............................">
                </td>
            </tr>
            <tr>
                <td>
                    <span>* مدت زمان نگهداری نمونه قبل از آنالیز</span>
                    <input type="text" maxlength="3" name="storage_time" value="{{old('storage_time')}}" style="width: 50px;min-width: 50px" placeholder=".............">
                    <span>روز *روش استاندارد پیشنهادی:</span>
                    <input type="text" class="width-dynamic proba dva" name="suggest_method" value="{{old('suggest_method')}}" placeholder="............................">
                </td>
            </tr>
            <tr>
                <td>
                    <span>* شرح درخواست:</span>
                    <input type="text" class="width-dynamic proba dva" name="request_description" value="{{old('request_description')}}" placeholder="............................">
                </td>
            </tr>
            <tr>
                <td>
                    <span>* مخاطب فاکتور (حقوقی):</span>
                    <input type="text" class="width-dynamic proba dva" name="legal_person" required="" oninvalid="this.setCustomValidity('نام مخاطب حقوقی را وارد نمایید.')" value="{{old('legal_person')}}" placeholder="............................">
                    <span>نام متقاضی در فاکتور (حقیقی):</span>
                    <input type="text" class="width-dynamic proba dva" name="natural_person" required="" oninvalid="this.setCustomValidity('نام متقاضی حقیقی را وارد نمایید.')" value="{{old('natural_person')}}" placeholder="............................">
                </td>
            </tr>
        </table>

        {{--table 3--}}
        {{--نکات مهم--}}
        <table class="table-3">
            <tr>
                <th rowspan="4" style="width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">نکات&nbsp;مهم</span></th>
                <td style="font-size: 19px">
                    1-حداقل مقدار نمونه 10 میلی گرم باشد. 2- برچسب روی هر نمونه باید شامل نام متقاضی،نام نمونه و سمیت احتمالی و نوع هسته مد نظر باشد.
                </td>
            </tr>
            <tr>
                <td style="font-size: 19px">
                    3-ساختار احتمالی نمونه ها پیوست گردد.4-در صورت درخواست چند آنالیز مجزا از یک نمونه،می بایست ضمن تکمیل فرم مربوط به هر آنالیز،آن
                </td>
            </tr>
            <tr>
                <td style="font-size: 19px">
                    نمونه به صورت تفکیک شده در ظروف جداگانه به میزان نیاز برای هر آنالیز،تحویل گردد.5-اسکن عادی NMR بر مبنای 1500 پالس در دمای
                </td>
            </tr>
            <tr>
                <td style="font-size: 19px">
                    محیط(20-25 c) است.
                </td>
            </tr>
        </table>

        {{--table 4--}}
        {{--مشخصات نمونه و آزمون--}}
        <table class="table-4">
            <tr>
                <th rowspan="10" style="max-width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle" width="70px"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مشخصات&nbsp;نمونه&nbsp;و&nbsp;آزمون</span></th>
                <td>
                    <span style="margin: 0 15px">نوع نمونه:</span>
                    <span style="margin: 0 15px">عادی<input type="radio" checked name="sample_type" value="عادی"></span>
                    <span style="margin: 0 15px">سمی<input type="radio" name="sample_type" value="سمی"></span>
                    <span style="margin: 0 15px">قابل انفجار یا اشتعال<input type="radio" name="sample_type" value="قابل انفجار یا اشتعال"></span>
                    <span style="margin: 0 15px">رادیواکتیو<input type="radio" name="sample_type" value="رادیواکتیو"></span>
                </td>
            </tr>
            <tr>
                <td  style="margin: 0;padding: 0">
                    <table style="margin: 0;padding: 0">
                        <tr>
                            <td>نام نمونه</td>
                            <td>کد نمونه</td>
                            <td>هسته</td>
                            <td>حلال</td>
                            <td>شرایط</td>
                        </tr>
                        @for($j=0;$j<=9;$j++)
                            <tr>
                                <td class="no_m_g"><input name="sample_name{{$j}}"      value="{{old('sample_name'.$j)}}" style="width: 100%;max-width: 100%;margin: 0;padding: 5px 0;text-align: center" type="text" placeholder="..................."></td>
                                <td class="no_m_g"><input name="sample_code{{$j}}"      value="{{old('sample_code'.$j)}}" style="width: 100%;max-width: 100%;margin: 0;padding: 5px 0;text-align: center" type="text" placeholder="..................."></td>
                                <td class="no_m_g"><input name="sample_core{{$j}}"      value="{{old('sample_core'.$j)}}" style="width: 100%;max-width: 100%;margin: 0;padding: 5px 0;text-align: center" type="text" placeholder="..................."></td>
                                <td class="no_m_g"><input name="sample_solvent{{$j}}"   value="{{old('sample_solvent'.$j)}}" style="width: 100%;max-width: 100%;margin: 0;padding: 5px 0;text-align: center" type="text" placeholder="..................."></td>
                                <td class="no_m_g"><input name="sample_condition{{$j}}" value="{{old('sample_condition'.$j)}}" style="width: 100%;max-width: 100%;margin: 0;padding: 5px 0;text-align: center" type="text" placeholder="..................."></td>
                            </tr>
                        @endfor

                    </table>
                </td>
            </tr>
        </table>

        {{--table 5--}}
        {{--پیوست مدارک--}}
        <table class="table-5">
            <tr>
                <th rowspan="2" style="padding: 10px 0;width: 70px;background-color: #bbbbbb;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مدارک پیوست</span></th>
                <td style="font-size: 19px">
                    معرفی نامه(کارت دانشجویی/کارت شناسایی/ معرفی نامه مخصوص موسسه و شرکت ها):&nbsp;
                    دارد<input type="radio"  name="recommend" value="دارد">&nbsp;&nbsp;
                    ندارد<input type="radio" checked name="recommend" value="ندارد">
                </td>
            </tr>
            <tr>
                <td style="font-size: 19px">
                    مرجع صدور:
                    <input type="text" class="width-dynamic proba dva" name="reference" value="{{old('reference')}}" placeholder="............................">
                    شماره:
                    <input type="text" class="width-dynamic proba dva" name="reference_num" value="{{old('reference_num')}}" placeholder="............................">
                </td>
            </tr>
        </table>

        {{--پذیرش--}}
        <table class="table-6">
                <tr>
                    <th rowspan="2" style="padding: 10px 0;width: 70px;background-color: #bbbbbb;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">پذیرش</span></th>
                    <td style="font-size: 19px">
                        نحوه تحویل:&nbsp;
                        حضوری<input type="radio" checked name="reception_transfer_method" value="حضوری">&nbsp;&nbsp;
                        ارسال پست<input type="radio" name="reception_transfer_method" value="ارسال پست">&nbsp;&nbsp;
                        تاریخ تحویل:&nbsp;
                        <input type="date" name="transfer_date" class="width-dynamic proba dva">
                    </td>
                </tr>
                </tr>
                <tr>
                    <td style="font-size: 19px">
                        نحوه پرداخت:&nbsp;
                        فیش بانکی<input type="radio" checked name="payment_method" value="فیش بانکی">&nbsp;&nbsp;
                        اینترنتی<input type="radio" name="payment_method" value="اینترنتی">&nbsp;&nbsp;
                    </td>
                </tr>
            </table>

            <input type="submit" value="" style="background: url({{asset('/images/icon/check.png')}}) no-repeat center center;cursor: pointer;height: 40px;width: 100%;background-color: #757575;text-align: center;margin: 0 auto;display: block;border-radius: 5px">

        </form>
        {{--end of form--}}
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
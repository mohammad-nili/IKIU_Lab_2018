@extends('home')
@section('style')
    <style>
        table {
            font-size: 20px;
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

        .table-2, .table-3, .table-4, .table-5, .table-6, .table-9 {
            margin: 10px 0;
        }

        .table-2 td, .table-3 td, .table-5 td, .table-6 td, .table-7 td, .table-8 td, .table-9 td {
            border: none;
        }

        .table-9 td {
            border-left: 1px solid black;
            text-align: center;
        }

        input[type="radio"] {
            -webkit-appearance: checkbox; /* Chrome, Safari, Opera */
            -moz-appearance: checkbox; /* Firefox */
            -ms-appearance: checkbox; /* not currently supported */
        }

        input[type=text] {
            color: #4169e1;
            margin: 0;
            border-radius: 4px;
            border: 1px solid #757575;
            padding: 5px;
            align-self: center;
            min-width: 80px;
            max-width: 500px;
        }

        .no_m_g {
            margin: 0;
            padding: 0;
            color: #4169e1;
            text-align: center;
        }

        .no_m_g > input[type=text] {
            border: none;
        }

        .sheet_title {
            display: block;
            width: 200px;
            font-size: 19px;
            border: 2px solid black;
            color: black;
            font-weight: bold;
            padding: 5px 50px;
            margin: 0 auto;
        }

        .sheet_header {
            color: black;
            margin: 0 auto;
            font-weight: bold;
            font-size: 14px
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

        <div style="text-align: center">
            <span class="sheet_title">درخواست آزمون NMR</span>
            <span class="sheet_header">لطفاً این برگه را پس از تکمیل به همراه نمونه های خود و مدارک لازم به دفتر آزمایشگاه جهت پذیرش تحویل دهید.</span>
        </div>

        {{--table 0--}}
        {{--مشخصات مشتری--}}
        @include('layouts.exams.partial.customer_content_complete')


        {{--table 2--}}
        {{--درخواست مشتری--}}
        <table class="table-2">
            <tr>
                <th rowspan="5"
                    style="width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle">
                    <span style="writing-mode: vertical-rl;	transform: rotate(180deg);">درخواست مشتری</span></th>
                <td>
                    <span style="margin: 0 15px">آزمون<input disabled type="radio"
                                                             @if($request->request_type=='آزمون') checked
                                                             @endif name="customer_req" value="آزمون"></span>
                    <span style="margin: 0 15px">آماده سازی<input disabled type="radio"
                                                                  @if($request->request_type=='آماده سازی') checked
                                                                  @endif name="customer_req" value="آماده سازی"></span>
                    <span style="margin: 0 15px">استفاده از تجهیزات جانبی<input disabled type="radio"
                                                                                @if($request->request_type=='استفاده از تجهیزات جانبی') checked
                                                                                @endif name="customer_req"
                                                                                value="استفاده از تجهیزات جانبی"></span>
                    <span style="margin: 0 15px">عودت باقی ماند نمونه<input disabled type="radio"
                                                                            @if($request->request_type=='عودت باقی ماند نمونه') checked
                                                                            @endif name="customer_req"
                                                                            value="عودت باقی ماند نمونه"></span>
                    <span style="margin: 0 15px">صدور فاکتور<input disabled type="radio"
                                                                   @if($request->request_type=='صدور فاکتور') checked
                                                                   @endif name="customer_req"
                                                                   value="صدور فاکتور"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="width: 50%;min-width: 50%">* شرایط خاص نمونه(نگهداری،حمل و نقل،انبارش):</span>
                    <span style="flex: 1;color: #4169e1;">{{$request->test_condition}}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>* مدت زمان نگهداری نمونه قبل از آنالیز</span>
                    <span style="flex: 1;color: #4169e1;">{{$request->storage_time}}</span>
                    <span>روز *روش استاندارد پیشنهادی:</span>
                    <span style="flex: 1;color: #4169e1;">{{$request->suggest_method}}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>* شرح درخواست:</span>
                    <span style="flex: 1;color: #4169e1;">{{$request->request_description}}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>* مخاطب فاکتور (حقوقی):</span>
                    <span style="flex: 1;color: #4169e1;">{{$request->legal_person}}</span>
                    <span>نام متقاضی در فاکتور (حقیقی):</span>
                    <span style="flex: 1;color: #4169e1;">{{$request->natural_person}}</span>
                </td>
            </tr>
        </table>

        {{--table 3--}}
        {{--نکات مهم--}}
        <table class="table-3">
            <tr>
                <th rowspan="4"
                    style="width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle">
                    <span style="writing-mode: vertical-rl;	transform: rotate(180deg);">نکات&nbsp;مهم</span></th>
                <td style="font-size: 19px">
                    1-حداقل مقدار نمونه 10 میلی گرم باشد. 2- برچسب روی هر نمونه باید شامل نام متقاضی،نام نمونه و سمیت
                    احتمالی و نوع هسته مد نظر باشد.
                </td>
            </tr>
            <tr>
                <td style="font-size: 19px">
                    3-ساختار احتمالی نمونه ها پیوست گردد.4-در صورت درخواست چند آنالیز مجزا از یک نمونه،می بایست ضمن
                    تکمیل فرم مربوط به هر آنالیز،آن
                </td>
            </tr>
            <tr>
                <td style="font-size: 19px">
                    نمونه به صورت تفکیک شده در ظروف جداگانه به میزان نیاز برای هر آنالیز،تحویل گردد.5-اسکن عادی NMR بر
                    مبنای 1500 پالس در دمای
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
                <th rowspan="10"
                    style="max-width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle"
                    width="70px"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مشخصات&nbsp;نمونه&nbsp;و&nbsp;آزمون</span>
                </th>
                <td>
                    <span style="margin: 0 15px">نوع نمونه:</span>
                    <span style="margin: 0 15px">عادی<input disabled type="radio"
                                                            @if($request->sample->first()->type=='عادی') checked
                                                            @endif name="sample_type" value="عادی"></span>
                    <span style="margin: 0 15px">سمی<input disabled type="radio"
                                                           @if($request->sample->first()->type=='سمی') checked
                                                           @endif  name="sample_type" value="سمی"></span>
                    <span style="margin: 0 15px">قابل انفجار یا اشتعال<input disabled type="radio"
                                                                             @if($request->sample->first()->type=='قابل انفجار یا اشتعال') checked
                                                                             @endif  name="sample_type"
                                                                             value="قابل انفجار یا اشتعال"></span>
                    <span style="margin: 0 15px">رادیواکتیو<input disabled type="radio"
                                                                  @if($request->sample->first()->type=='رادیواکتیو') checked
                                                                  @endif name="sample_type" value="رادیواکتیو"></span>
                </td>
            </tr>
            <tr>
                <td style="margin: 0;padding: 0">
                    <table style="margin: 0;padding: 0">
                        <tr>
                            @foreach($request->sample[0]->sample_attr as $title)
                                <td>{{$title->name}}</td>
                            @endforeach
                        </tr>
                        @foreach($request->sample as $sample)
                            <tr>
                            @foreach($sample->sample_attr as $attr)
                                    <td class="no_m_g">{{$attr->value}}</td>
                            @endforeach
                            </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        </table>
        {{--table 5--}}
        {{--پیوست مدارک--}}
        <table class="table-5">
            <tr>
                <th rowspan="2"
                    style="padding: 10px 0;width: 70px;background-color: #bbbbbb;text-align: center;vertical-align: middle">
                    <span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مدارک پیوست</span></th>
                <td style="font-size: 19px">
                    معرفی نامه(کارت دانشجویی/کارت شناسایی/ معرفی نامه مخصوص موسسه و شرکت ها):&nbsp;
                    دارد<input type="radio" disabled @if($request->attachment->first()->recommend=='دارد') checked
                               @endif name="recommend" value="دارد">&nbsp;&nbsp;
                    ندارد<input type="radio" disabled @if($request->attachment->first()->recommend=='ندارد') checked
                                @endif  name="recommend" value="ندارد">
                </td>
            </tr>
            <tr>
                <td style="font-size: 19px">
                    مرجع صدور:
                    <span style="color: #4169e1;">{{$request->attachment->first()->reference}}</span>
                    شماره:
                    <span style="color: #4169e1;">{{$request->attachment->first()->reference_num}}</span>
                </td>
            </tr>
        </table>

        {{--end of form--}}
        @if(auth()->user()->role!='customer')
            {{--table 6--}}
            {{--نظر کارشناس--}}

            <form enctype="multipart/form-data" method="post" action="{{route('RS2')}}">
                {!! csrf_field() !!}

                <input type="hidden" value="{{$request->id}}" name="req_id">
                <table class="table-6">
                    <tr>
                        <th rowspan="4"
                            style="padding: 10px 0;width: 70px;background-color: #404040;color: white;text-align: center;vertical-align: middle">
                            <span style="writing-mode: vertical-rl;	transform: rotate(180deg);">نظر کارشناس</span>
                        </th>
                        <td style="font-size: 19px">
                            نوع آزمون:&nbsp;
                            مخرب<input type="radio" checked name="P_N" value="مخرب">&nbsp;&nbsp;
                            غیر مخرب<input type="radio" name="P_N" value="غیر مخرب">&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;
                            وضعیت پلمپ نمونه ها:&nbsp;
                            دارد<input type="radio" checked name="plump" value="دارد">&nbsp;&nbsp;
                            ندارد<input type="radio" name="plump" value="ندارد">&nbsp;&nbsp;
                            آسیب دیده<input type="radio" name="plump" value="آسیب دیده">&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 19px">
                            وضعیت آزمون:&nbsp;
                            قابل انجام<input type="radio" checked name="test_status" value="قابل انجام">&nbsp;&nbsp;
                            غیر قابل انجام<input type="radio" name="test_status" value="غیر قابل انجام">&nbsp;&nbsp;
                            علت عدم انجام:
                            <input type="text" name="failed_request_cause" class="width-dynamic proba dva"
                                   placeholder="............................">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 19px">
                            تایید پذیرش:&nbsp;
                            شود<input type="radio" checked name="reception_confirm" value="شود">&nbsp;&nbsp;
                            نشود<input type="radio" name="reception_confirm" value="نشود">&nbsp;&nbsp;
                            علت عدم پذیرش:
                            <input type="text" name="failed_reception_cause" class="width-dynamic proba dva"
                                   placeholder="............................">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 19px">
                            هزینه کل (ریال):&nbsp;
                            <input type="text" required name="cost" class="width-dynamic proba dva"
                                   placeholder="............................">
                            <select name="browsers">
                            @foreach($tags as $tag)
                                    <option style="float: right" value="cheese">{{$tag->name}}&nbsp&nbsp&nbsp&nbsp&nbsp{{number_format((int)$tag->cost)}}{{ __(' ریال ') }}
                                    &nbsp&nbsp&nbsp&nbsp&nbsp{{$tag->description}}
                                    </option>
                            @endforeach
                            </select>
                            <button style="margin: 15px 0">
                                <a style="color: #434343;"  target="_blank" href="{{route('tariff',['All'])}}">لیست تعرفه ها</a>
                            </button>
                        </td>
                    </tr>
                </table>

                <input type="submit" value=""
                       style="background: url({{asset('/images/icon/check.png')}}) no-repeat center center;cursor: pointer;height: 40px;width: 100%;background-color: #757575;text-align: center;margin: 10px auto;display: block;border-radius: 5px">
            </form>

        @endif
    </div>

@endsection
@section('scripts')
    <script src="/js/input.js"></script>
    <script>
        let inputs = document.getElementsByTagName('input');
        inputs = Array.from(inputs);
        inputs.map(i => {
            if (i.type === 'text') {
                i.setAttribute('maxLength', 50)
            }
        })
    </script>
@endsection
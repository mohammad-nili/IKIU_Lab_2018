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
        input[type=text] {
            color: #4169e1;
            margin: 0;
            border-radius: 4px;
            border: 1px solid #757575;
            padding: 5px;align-self: center;min-width: 80px;max-width: 500px;
        }
        .no_m_g{
            margin: 0;padding: 0;
            color: #4169e1;
            text-align: center;
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

        <div style="text-align: center">
            <span class="sheet_title">درخواست آزمون NMR</span>
            <span class="sheet_header">لطفاً این برگه را پس از تکمیل به همراه نمونه های خود و مدارک لازم به دفتر آزمایشگاه جهت پذیرش تحویل دهید.</span>
        </div>

        {{--table 1--}}
        {{--مشخصات مشتری--}}
        @include('layouts.exams.partial.customer_content_complete')

        @include('layouts.exams.partial.IN_OUT_complete')

        {{--table 2--}}
        {{--درخواست مشتری--}}
        @include('layouts.exams.partial.customer_request_complete')

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
                    <span style="margin: 0 15px">عادی<input disabled type="radio" @if($request->sample->first()->type=='عادی') checked @endif name="sample_type" value="عادی"></span>
                    <span style="margin: 0 15px">سمی<input disabled type="radio" @if($request->sample->first()->type=='سمی') checked @endif  name="sample_type" value="سمی"></span>
                    <span style="margin: 0 15px">قابل انفجار یا اشتعال<input disabled type="radio" @if($request->sample->first()->type=='قابل انفجار یا اشتعال') checked @endif  name="sample_type" value="قابل انفجار یا اشتعال"></span>
                    <span style="margin: 0 15px">رادیواکتیو<input disabled type="radio" @if($request->sample->first()->type=='رادیواکتیو') checked @endif name="sample_type" value="رادیواکتیو"></span>
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

                        @foreach($request->sample as $sample)
                            <tr>
                                <td class="no_m_g">{{$sample->name}}</td>
                                <td class="no_m_g">{{$sample->code}}</td>
                                <td class="no_m_g">{{$sample->core}}</td>
                                <td class="no_m_g">{{$sample->solvent}}</td>
                                <td class="no_m_g">{{$sample->condition}}</td>
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
                <th rowspan="2" style="padding: 10px 0;width: 70px;background-color: #bbbbbb;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مدارک پیوست</span></th>
                <td style="font-size: 19px">
                    معرفی نامه(کارت دانشجویی/کارت شناسایی/ معرفی نامه مخصوص موسسه و شرکت ها):&nbsp;
                    دارد<input type="radio" disabled @if($request->attachment->first()->recommend=='دارد') checked @endif name="recommend" value="دارد">&nbsp;&nbsp;
                    ندارد<input type="radio" disabled @if($request->attachment->first()->recommend=='ندارد') checked @endif  name="recommend" value="ندارد">
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


                <table class="table-6">
                    <tr>
                        <th rowspan="4" style="padding: 10px 0;width: 70px;background-color: #bbbbbb;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">نظر کارشناس</span></th>
                        <td style="font-size: 19px">
                            نوع آزمون:&nbsp;
                            مخرب<input type="radio" disabled @if($request->P_N=='مخرب') checked @endif name="test_type" value="مخرب">&nbsp;&nbsp;
                            غیر مخرب<input type="radio" disabled @if($request->P_N=='غیر مخرب') checked @endif name="test_type" value="غیر مخرب">&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;
                            وضعیت پلمپ نمونه ها:&nbsp;
                            دارد<input type="radio" disabled @if($request->plump=='دارد') checked @endif name="plump" value="دارد">&nbsp;&nbsp;
                            ندارد<input type="radio" disabled @if($request->plump=='ندارد') checked @endif name="plump" value="ندارد">&nbsp;&nbsp;
                            آسیب دیده<input type="radio" disabled @if($request->plump=='آسیب دیده') checked @endif name="plump" value="آسیب دیده">&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 19px">
                            وضعیت آزمون:&nbsp;
                            قابل انجام<input type="radio" disabled @if($request->status!= -2) checked @endif name="test_status" value="قابل انجام">&nbsp;&nbsp;
                            غیر قابل انجام<input type="radio" disabled @if($request->status==-2) checked @endif name="test_status" value="غیر قابل انجام">&nbsp;&nbsp;
                            علت عدم انجام:
                            <span style="color: #4169e1;">{{$request->failed_request_cause}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 19px">
                            تایید پذیرش:&nbsp;
                            شود<input type="radio" disabled @if($request->reception->reception_status=='شود') checked @endif name="reception_confirm" value="شود">&nbsp;&nbsp;
                            نشود<input type="radio" disabled @if($request->reception->reception_status=='نشود') checked @endif name="reception_confirm" value="نشود">&nbsp;&nbsp;
                            علت عدم پذیرش:
                            <span style="color: #4169e1;">{{$request->reception->failed_reception_cause}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 19px">
                            هزینه کل (ریال):&nbsp;
                            <span style="color: #4169e1;">{{$request->reception->total_cost}}</span>
                        </td>
                    </tr>
                </table>


            <form enctype="multipart/form-data" method="post" action="{{route('end')}}">
                {!! csrf_field() !!}
                <input type="hidden" value="{{$request->id}}" name="req_id">

                {{--table 7--}}
            {{--پذیرش--}}
            <table class="table-7">
                <tr>
                    <th rowspan="3" style="padding: 10px 0;width: 70px;background-color: #404040;color: white;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">پذیرش</span></th>
                    <td style="font-size: 19px">
                        تعداد نمونه ها:&nbsp;
                        <span style="color: #4169e1;">{{$request->reception->sample_count}}</span>
                        کد های آزمون:&nbsp;
                        <input type="text" class="width-dynamic proba dva" placeholder="............................">
                        نحوه تحویل:&nbsp;
                        حضوری<input type="radio" name="reception_transfer_method" value="حضوری">&nbsp;&nbsp;
                        ارسال پست<input type="radio" name="reception_transfer_method" value="ارسال پست">&nbsp;&nbsp;
                        تاریخ تحویل:&nbsp;
                        <input type="text" class="width-dynamic proba dva" placeholder="............................">
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 19px">
                        هزینه کل(ریال):&nbsp;
                        <span style="color: #4169e1;">{{$request->reception->payment}}</span>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 19px">
                        نحوه پرداخت:&nbsp;
                        فیش بانکی<input type="radio" disabled checked name="payment_method" value="فیش بانکی">&nbsp;&nbsp;
                        اینترنتی<input type="radio" disabled name="payment_method" value="اینترنتی">&nbsp;&nbsp;
                        شماره پیگیری:
                        <input type="text" class="width-dynamic proba dva" placeholder="............................">
                    </td>
                </tr>
            </table>

            {{--table 8--}}
            {{--جواب دهی--}}
            <table class="table-8">
                <tr>
                    <th rowspan="3" style="padding: 10px 0;width: 70px;background-color: #404040;color: white;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">جواب&nbsp;دهی</span></th>
                    <td style="font-size: 19px">
                        شماره گواهینامه/نتایج:&nbsp;
                        <input type="text" class="width-dynamic proba dva" placeholder="............................">
                        تاریخ تحویل/ارسال:&nbsp;
                        <input type="text" class="width-dynamic proba dva" placeholder="............................">
                        تحویل گیرنده:&nbsp;
                        <input type="text" class="width-dynamic proba dva" placeholder="............................">
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 19px">
                        نحوه تحویل/ارسال:&nbsp;
                        وب سایت آزمایشگاه<input type="radio" name="answer_transfer_method" value="وب سایت آزمایشگاه">&nbsp;&nbsp;
                        حضوری<input type="radio" name="answer_transfer_method" value="حضوری">&nbsp;&nbsp;
                        نمابر<input type="radio" name="answer_transfer_method" value="نمابر">&nbsp;&nbsp;
                        پست الکترونیکی<input type="radio" name="answer_transfer_method" value="پست الکترونیکی">&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 19px">
                        شماره فاکتور:&nbsp;
                        <input type="text" class="width-dynamic proba dva" placeholder="............................">
                    </td>
                </tr>
            </table>

            {{--table 9--}}
            {{--تأیید و امضا--}}
            <table class="table-9">
                <tr style="border: 1px solid black">
                    <th rowspan="2" style="padding: 10px 0;max-width: 70px;background-color: #bbbbbb;text-align: center;vertical-align: middle" width="70px"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">تأیید&nbsp;و&nbsp;امضاء</span></th>
                    <td style="text-align: center;font-size: 19px">
                        متقاضی آزمون:&nbsp;
                    </td>
                    <td style="font-size: 19px">
                        کارشناس آزمایشگاه:&nbsp;
                    </td>

                </tr>
                <tr>
                    <td height="100px" style="flex: 1;color: #2a9055">✓</td>
                    <td height="100px" style="flex: 1;color: #2a9055">✓</td>
                </tr>
            </table>

            <hr style=" border: 0;border-bottom: 2px dashed black;">

            {{--table 10--}}
            {{--رسید آزمایشگاهی--}}
            <table class="table-10">
                <tr>
                    <td colspan="4" style="text-align: center;background-color: #bbbbbb">رسید آزمایشگاهی</td>
                </tr>
                <tr>
                    <td style="flex: 1">
                        <span>کد ثبت درخواست:</span>
                        <input type="text" class="width-dynamic proba dva" placeholder=".................">
                    </td>
                    <td style="flex: 1">
                        <span>هزینه دریافتی (ریال):</span>
                        <input type="text" class="width-dynamic proba dva" placeholder=".................">
                    </td>
                    <td style="flex: 1">
                        <span>شماره فیش:</span>
                        <input type="text" class="width-dynamic proba dva" placeholder=".................">
                    </td>
                    <td style="flex: 1">
                        <span>تاریخ تحویل:</span>
                        <input type="text" class="width-dynamic proba dva" placeholder="1397/08/11">
                    </td>
                </tr>
                <tr>
                    <td colspan="1" rowspan="1" style="font-size: 19px">
                        <span>زمان جواب دهی:&nbsp;</span>
                        <input type="text" class="width-dynamic proba dva" placeholder=".................">
                    </td>
                    <td colspan="2" rowspan="1" style="font-size: 19px">
                        <span>اقلام دریافتی:</span>&nbsp;
                        <input type="text" class="width-dynamic proba dva" placeholder=".................">
                    </td>
                    <td colspan="2" rowspan="5" style="height: 150px;width: 150px;vertical-align: top;font-size: 19px">
                        <span>مهر و امضای پذیرش:&nbsp;</span>&nbsp;
                        <span height="100px" style="flex: 1;color: #2a9055">✓</span>
                    </td>
                </tr>
                <tr>
                    <td  colspan="3" style="font-size: 17px">
                        توجه:در صورت بروز هرگونه مشکل ناشی از عدم صحت  موارد فوق،خسارت ایجاد شده بر عهده مشتری می باشد. چنانچه بنا به تشخیص
                        <br>
                        کارشناس،آنالیز نمونه مستلزم روند و زمان خارج از حد معمول باشد، هزینه ی مربوطه جداگانه محاسبه و وصول خواهد شد. در صورت بروز
                        <br>
                        حوادث پیش بینی نشده یا سرویس تعمیر دستگاه،به زمان حواب دهی افزوده خواهد شد. نمون ها حداکثر تا یک هفته بعد از اعلام
                        <br>
                        نتایج، در آزمایشگاه نگهداری می شوند.
                    </td>
                </tr>
            </table>
                <input  type="submit" value="" style="background: url({{asset('/images/icon/check.png')}}) no-repeat center center;cursor: pointer;height: 40px;width: 100%;background-color: #757575;text-align: center;margin: 10px auto;display: block;border-radius: 5px">
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
            if(i.type === 'text'){
                i.setAttribute('maxLength', 50)
            }
        })
    </script>
@endsection
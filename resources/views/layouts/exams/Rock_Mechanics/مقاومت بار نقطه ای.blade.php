@extends('layouts.exams.main')

@section('star_points')
    ۱− سایز نمونه های قابل قبول حداکثر ۱۰۰ میلی متر است که در واقع بلوک به ابعاد ۲۰×۲۰×۲۰ نیاز است که بعد از مغزه گیری ، این آزمون به روش قطری یا محوری انجام می گیرد. ۲−برچسب روی هر نمونه باید شامل نام متقاضی ،شماره نمونه و سمیت احتمالی باشد.
@endsection

@if(!isset($request->status))
@section('samples')

    <table class="table-4">
        <tr>
            <th rowspan="10" style="max-width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle" width="70px"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مشخصات&nbsp;نمونه&nbsp;و&nbsp;آزمون</span></th>
            <td>
                <span style="margin: 0 15px">نوع نمونه:</span>
                <span style="margin: 0 15px">خشک<input type="radio" checked name="sample_type" value="خشک"></span>
                <span style="margin: 0 15px">اشباع<input type="radio" name="sample_type" value="اشباع"></span>
            </td>
        </tr>
        <tr>
            <td  style="margin: 0;padding: 0">
                <table style="margin: 0;padding: 0">
                    <tr>

                        <td><input type="hidden" name="{{'sample_name0'}}" value="نمونه">نمونه</td>
                        <td>شرط</td>
                        <td><input type="hidden" name="{{'sample_name1'}}" value="شاخص مقاومت بار نقطه ای تصحیح شده (مگاپاسکال)">شاخص مقاومت بار نقطه ای تصحیح شده (مگاپاسکال)</td>
                        <td><input type="hidden" name="{{'sample_name2'}}" value="F ضریب تصحیح">F ضریب تصحیح</td>
                        <td><input type="hidden" name="{{'sample_name3'}}" value="Isشاخص مقاومت بار نقطه ای تصحیح نشده (مگاپاسکال)">Isشاخص مقاومت بار نقطه ای تصحیح نشده (مگاپاسکال)</td>
                        <td><input type="hidden" name="{{'sample_name4'}}" value="P بار شکست">P بار شکست</td>
                        <td><input type="hidden" name="{{'sample_name5'}}" value="DC قطر مغزه معادل">DC قطر مغزه معادل</td>
                        <td><input type="hidden" name="{{'sample_name6'}}" value="A سطح مقطع عرضی (mm2)">A سطح مقطع عرضی (mm2)</td>
                        <td><input type="hidden" name="{{'sample_name7'}}" value="D/W">D/W</td>
                        <td><input type="hidden" name="{{'sample_name8'}}" value="L نصف طول نمونه mm">L نصف طول نمونه mm</td>
                        <td><input type="hidden" name="{{'sample_name9'}}" value="W عرض نمونه mm">W عرض نمونه mm</td>
                        <td><input type="hidden" name="{{'sample_name10'}}" value="D فاصله بین دو فک">D فاصله بین دو فک</td>
                        <td><input type="hidden" name="{{'sample_name11'}}" value="نوع نمونه">نوع نمونه</td>
                        <td><input type="hidden" name="{{'sample_name12'}}" value="شماره نمونه">شماره نمونه</td>
                    </tr>
                    @for($r=0;$r<=2;$r++)
                        <tr>
                            <td>
                                <select name="sample_value{{$r}}_0" id="sample_value{{$r}}_0" onchange="document.getElementById('option{{$r}}').value = document.getElementById('sample_value{{$r}}_0').value">
                                    <option value=''>انتخاب کنید</option>
                                    <option value="قطری">قطری</option>
                                    <option value="محوری">محوری</option>
                                    <option value="قطعه ای">قطعه ای</option>
                                </select>
                            </td>
                            <td>
                                <select disabled name="option{{$r}}" id="option{{$r}}">
                                    <option value=''>انتخاب کنید</option>
                                    <option value="قطری">L/D>1</option>
                                    <option value="محوری">0.3>D/W<1</option>
                                    <option value="قطعه ای">0.3>D/W<1</option>
                                </select>
                            </td>
                            @for($c=1;$c<=12;$c++)
                                <td class="no_m_g"><input name="sample_value{{$r}}_{{$c}}" value="{{old('sample_value'.$r.'_'.$c)}}" style="width: 100%;max-width: 100%;margin: 0;padding: 5px 0;text-align: center" type="text" placeholder="..................."></td>
                            @endfor
                        </tr>
                    @endfor
                    <input type="hidden" name="loop_rows" value="{{$r}}">
                    <input type="hidden" name="loop_columns" value="{{$c}}">
                </table>
            </td>
        </tr>
    </table>

@endsection


@elseif(isset($request->status) && $request->status>=2)
@section('samples')
    <table class="table-4">
        <tr>
            <th rowspan="10" style="max-width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle" width="70px"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مشخصات&nbsp;نمونه&nbsp;و&nbsp;آزمون</span></th>
            <td>
                <span style="margin: 0 15px">نوع نمونه:</span>
                <span style="margin: 0 15px">خشک<input disabled type="radio" @if($request->sample->first()->type=='خشک') checked @endif  name="sample_type" value="خشک"></span>
                <span style="margin: 0 15px">اشباع<input disabled type="radio" @if($request->sample->first()->type=='اشباع') checked @endif  name="sample_type" value="اشباع"></span>
            </td>
        </tr>
        <tr>
            <td style="margin: 0;padding: 0">
                <table style="margin: 0;padding: 0">
                    <tr>
                        <td>نمونه</td>
                        <td>شرط</td>
                        <td>شاخص مقاومت بار نقطه ای تصحیح شده (مگاپاسکال)</td>
                        <td>F ضریب تصحیح</td>
                        <td>Isشاخص مقاومت بار نقطه ای تصحیح نشده (مگاپاسکال)</td>
                        <td>P بار شکست</td>
                        <td>DC قطر مغزه معادل</td>
                        <td>A سطح مقطع عرضی (mm2)</td>
                        <td>D/W</td>
                        <td>L نصف طول نمونه mm</td>
                        <td>W عرض نمونه mm</td>
                        <td>D فاصله بین دو فک</td>
                        <td>نوع نمونه</td>
                        <td>شماره نمونه</td>
                    </tr>
                    @foreach($request->sample as $sample)
                        <tr>
                            <td class="no_m_g">{{$sample->sample_attr[0]->value}}</td>
                            @if($sample->sample_attr[0]->value=='قطری')
                                <td class="no_m_g">L/D>1</td>
                            @elseif($sample->sample_attr[0]->value=='محوری')
                                <td class="no_m_g">0.3>D/W<1</td>
                            @elseif($sample->sample_attr[0]->value=='قطعه ای')
                                <td class="no_m_g">0.3>D/W<1</td>
                            @endif
                            @for($k=1;$k<=12;$k++)
                                <td class="no_m_g">{{$sample->sample_attr[$k]->value}}</td>
                            @endfor
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </table>
@endsection
@endif
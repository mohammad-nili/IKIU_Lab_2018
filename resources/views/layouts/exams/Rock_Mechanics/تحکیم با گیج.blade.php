@extends('layouts.exams.main')

@section('star_points')
    ۱−حداقل قطر نمونه ۵۰ میلی متر باشد. ۲− برچسب روی هر نمونه باید شامل نام متقاضی ، شماره نمونه و سمیت احتمالی باشد. ۳− حداقل ضخامت اولیه نمونه باید ۱۲ میلی متر باشد.این ضخامت نباید کمتر از ۱۰ برابر حداکثر اندازه های موجود در خاک باشد. ۴− حداقل نسبت قطر به ضخامت نمونه باید ۲/۵ باشد. ۵− در آماده سازی نمونه ها باید دقت کرد که حداقل دست خوردگی یا تغییر در رطوبت یا دانسیته مصالح به وجود آید. که خاک دست نخورده یا به صورت مغزه و یا به صورت بلوکی می بایست باشد.
@endsection

@if(!isset($request->status))
@section('samples')

    <table class="table-4">
        @include('layouts.exams.partial.sample_head')
        <tr>
            <td  style="margin: 0;padding: 0">
                <table style="margin: 0;padding: 0">
                    <tr>
                        <td><input type="hidden" name="{{'sample_name0'}}" value="مقدار وزنه بارگذاری">مقدار وزنه بارگذاری</td>
                        <td>مقدار وزنه باربرداری</td>
                        <td><input type="hidden" name="{{'sample_name1'}}" value="شروع">شروع</td>
                        <td><input type="hidden" name="{{'sample_name2'}}" value="خاتمه">خاتمه</td>
                        <td><input type="hidden" name="{{'sample_name3'}}" value="شرایط دیگر">شرایط دیگر</td>

                    </tr>
                    @for($r=0;$r<=3;$r++)
                        <tr>
                            <td>
                                <select name="sample_value{{$r}}_0" id="sample_value{{$r}}_0" onchange="document.getElementById('option{{$r}}').value = document.getElementById('sample_value{{$r}}_0').value">
                                    <option value=''>انتخاب کنید</option>
                                    <option value="۲ کیلو گرم">۲ کیلو گرم</option>
                                    <option value="۴ کیلو گرم">۴ کیلو گرم</option>
                                    <option value="۸ کیلو گرم">۸ کیلو گرم</option>
                                    <option value="۱۶ کیلو گرم">۱۶ کیلو گرم</option>
                                </select>
                            </td>
                            <td>
                                <select disabled name="option{{$r}}" id="option{{$r}}">
                                    <option value=''>انتخاب کنید</option>
                                    <option value="۲ کیلو گرم">-</option>
                                    <option value="۴ کیلو گرم">۴ کیلو گرم</option>
                                    <option value="۸ کیلو گرم">۸ کیلو گرم</option>
                                    <option value="۱۶ کیلو گرم">-</option>
                                </select>
                            </td>
                            @for($c=1;$c<=3;$c++)
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
            @include('layouts.exams.partial.sample_head_complete')
        </tr>
        <tr>
            <td style="margin: 0;padding: 0">
                <table style="margin: 0;padding: 0">
                    <tr>
                        <td>مقدار وزنه بارگذاری</td>
                        <td>مقدار وزنه باربرداری</td>
                        <td>شروع</td>
                        <td>خاتمه</td>
                        <td>شرایط دیگر</td>
                    </tr>
                    @foreach($request->sample as $sample)
                        <tr>
                            <td class="no_m_g">{{$sample->sample_attr[0]->value}}</td>
                            @if($sample->sample_attr[0]->value=='۲ کیلو گرم')
                                <td class="no_m_g">−</td>
                            @elseif($sample->sample_attr[0]->value=='۴ کیلو گرم')
                                <td class="no_m_g">۴ کیلو گرم</td>
                            @elseif($sample->sample_attr[0]->value=='۸ کیلو گرم')
                                <td class="no_m_g">۸ کیلو گرم</td>
                            @elseif($sample->sample_attr[0]->value=='۱۶ کیلو گرم')
                                <td class="no_m_g">−</td>
                            @endif
                            @for($k=1;$k<=3;$k++)
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
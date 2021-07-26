@extends('layouts.exams.main')

@section('star_points')
    ۱− وزن نمونه جامد پودری مورد نیاز برای طیف بینی جامد حداقل ۱ گرم  و ابعاد نمونه های لایه نشانی شده روی سطح ، حداقل ۲۰×۲۰×۰/۵ mm و حداکثر ۱۰۰×۵۰×۳۰ mm می باشد. ۲− تحویل حلال همراه نمونه مایع مورد نظر الزامی است. ۳− برچسب روی هر نمونه باید شامل نام متقاضی ، نام نمونه و سمیت احتمالی باشد. ۴− در صورت درخواست چند آنالیز مجزا از یک نمونه ، می بایست ضمن  تکمیل فرم مربوطه به هر آنالیز ، آن نمونه به صورت تفکیک شده در ظروف جداگانه به میزان نیاز برای هر آنالیز ، تحویل گردد.
@endsection

@if(!isset($request->status))
@section('samples')
    <table class="table-4">
        @include('layouts.exams.partial.sample_head')
        <tr>
        <td  style="margin: 0;padding: 0">
            <table style="margin: 0;padding: 0">
                <tr>
                    <td rowspan="2"><input type="hidden" name="{{'sample_name0'}}" value="نام نمونه">نام نمونه</td>
                    <td rowspan="2"><input type="hidden" name="{{'sample_name1'}}" value="کد نمونه">کد نمونه</td>
                    <td rowspan="2"><input type="hidden" name="{{'sample_name2'}}" value="فرمول شیمیایی">فرمول شیمیایی</td>
                    <td rowspan="2"><input type="hidden" name="{{'sample_name3'}}" value="حلال نمونه">حلال نمونه</td>
                    <td rowspan="2"><input type="hidden" name="{{'sample_name4'}}" value="ستون مورد نیاز">ستون مورد نیاز</td>
                    <td rowspan="2"><input type="hidden" name="{{'sample_name5'}}" value="برنامه شویش (برنامه دمایی)">برنامه شویش (برنامه دمایی)</td>
                    <td rowspan="2"><input type="hidden" name="{{'sample_name6'}}" value="محدوده جرم مولکولی آنالیز">محدوده جرم مولکولی آنالیز</td>
                    <td colspan="5">روش کروماتوگرافی</td>
                    <td colspan="4">اطلاعات مورد درخواست</td>
                </tr>
                <tr>
                    <td><input type="hidden" name="{{'sample_name7'}}" value="فاز معکوس">فاز معکوس</td>
                    <td><input type="hidden" name="{{'sample_name8'}}" value="یونی">یونی</td>
                    <td><input type="hidden" name="{{'sample_name9'}}" value="GPC">GPC</td>
                    <td><input type="hidden" name="{{'sample_name10'}}" value="کایرال">کایرال</td>
                    <td><input type="hidden" name="{{'sample_name11'}}" value="GC">GC</td>
                    <td><input type="hidden" name="{{'sample_name12'}}" value="اندازی گیری کمی">اندازی گیری کمی</td>
                    <td><input type="hidden" name="{{'sample_name13'}}" value="شناسایی">شناسایی</td>
                    <td><input type="hidden" name="{{'sample_name14'}}" value="تعیین محدوده جرمی">تعیین محدوده جرمی</td>
                    <td><input type="hidden" name="{{'sample_name15'}}" value="مقادیر Mz ,Mw">مقادیر Mz ,Mw</td>
                </tr>
                @for($r=0;$r<=3;$r++)
                    <tr>
                        @for($c=0;$c<=15;$c++)
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
                        <td rowspan="2">نام نمونه</td>
                        <td rowspan="2">کد نمونه</td>
                        <td rowspan="2">فرمول شیمیایی</td>
                        <td rowspan="2">حلال نمونه</td>
                        <td rowspan="2">ستون مورد نیاز</td>
                        <td rowspan="2">برنامه شویش (برنامه دمایی)</td>
                        <td rowspan="2">محدوده جرم مولکولی آنالیز</td>
                        <td colspan="5">روش کروماتوگرافی</td>
                        <td colspan="4">اطلاعات مورد درخواست</td>
                    </tr>
                    <tr>
                        <td>فاز معکوس</td>
                        <td>یونی</td>
                        <td>GPC</td>
                        <td>کایرال</td>
                        <td>GC</td>
                        <td>اندازی گیری کمی</td>
                        <td>شناسایی</td>
                        <td>تعیین محدوده جرمی</td>
                        <td>مقادیر Mz ,Mw</td>
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
@endsection
@endif
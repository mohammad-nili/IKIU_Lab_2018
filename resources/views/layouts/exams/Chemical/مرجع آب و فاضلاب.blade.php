@extends('layouts.exams.main')

@section('star_points')
     ۱− در صورت درخواست چند آنالیز مجزا از یک نمونه ، می بایست ضمن  تکمیل فرم مربوطه به هر آنالیز ، آن نمونه به صورت تفکیک شده در ظروف جداگانه به میزان نیاز برای هر آنالیز ، تحویل گردد. ۲− برچسب روی هر نمونه باید شامل نام متقاضی ، نام نمونه و سمیت احتمالی باشد. ۳− اعلام محدوده غلظت آنالیز مورد نظر بر عهده ی مشتری می باشد. و در صورت نیاز به انجام آزمایشات اضافی به دلیل عدم اعلام غلظت آنالیز ، هزینه آن محاصبه گردد. ۴− با توجه به انجام آزمایش  طبق روش  های استاندارد مسئولیت خطای ایجاد شده ناشی از  گونه های فراهم شده بر عهده متقاضی است.
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
                        <td rowspan="2"><input type="hidden" name="{{'sample_name2'}}" value="زمان نمونه برداری">زمان نمونه برداری</td>
                        <td rowspan="2"><input type="hidden" name="{{'sample_name3'}}" value="شرایط نگهداری">شرایط نگهداری</td>
                        <td rowspan="2"><input type="hidden" name="{{'sample_name4'}}" value="منبع آب یا پساب">منبع آب یا پساب</td>
                        <td rowspan="2"><input type="hidden" name="{{'sample_name5'}}" value="ترکیبات احتمالی">ترکیبات احتمالی</td>
                        <td colspan="10">درخواست</td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="{{'sample_name6'}}" value="نیتریت">نیتریت</td>
                        <td><input type="hidden" name="{{'sample_name7'}}" value="سولفات">سولفات</td>
                        <td><input type="hidden" name="{{'sample_name8'}}" value="قلیائیت">قلیائیت</td>
                        <td><input type="hidden" name="{{'sample_name9'}}" value="BOD">BOD</td>
                        <td><input type="hidden" name="{{'sample_name10'}}" value="COD">COD</td>
                        <td><input type="hidden" name="{{'sample_name11'}}" value="PH">PH</td>
                        <td><input type="hidden" name="{{'sample_name12'}}" value="EC">EC</td>
                        <td><input type="hidden" name="{{'sample_name13'}}" value="TDS">TDS</td>
                        <td><input type="hidden" name="{{'sample_name14'}}" value="TS">TS</td>
                        <td><input type="hidden" name="{{'sample_name15'}}" value="TSS">TSS</td>
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
                        <td rowspan="2">زمان نمونه برداری</td>
                        <td rowspan="2">شرایط نگهداری</td>
                        <td rowspan="2">منبع آب یا پساب</td>
                        <td rowspan="2">ترکیبات احتمالی</td>
                        <td colspan="10">درخواست</td>
                    </tr>
                    <tr>
                        <td>نیتریت</td>
                        <td>سولفات</td>
                        <td>قلیائیت</td>
                        <td>BOD</td>
                        <td>COD</td>
                        <td>PH</td>
                        <td>EC</td>
                        <td>TDS</td>
                        <td>TS</td>
                        <td>TSS</td>
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
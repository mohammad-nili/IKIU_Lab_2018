@extends('layouts.exams.main')

@section('star_points')
        ۱− حداقل مقدار نمونه ۲۰ میلی لیتر + ۳۰ میلی لیتر مایع سنگین Zncl2 باشد. ۲− برچسب روی هر نمونه باید شامل نام متقاضی ، شماره نمونه و سمیت احتمالی باشد. ۳− نمونه به مدت ۱۵ دقیقه با دور ۲۰۰۰ در دستگاه قرار داده میشود که سبب جدایش نمونه های فسیلی (پالینومورف) از کانی های سنگین می شود.
@endsection

@if(!isset($request->status))
@section('samples')
    <table class="table-4">
        @include('layouts.exams.partial.sample_head')
        <tr>
            <td  style="margin: 0;padding: 0">
                <table style="margin: 0;padding: 0">
                    <tr>
                        <td><input type="hidden" name="{{'sample_name0'}}" value="نام نمونه">نام نمونه</td>
                        <td><input type="hidden" name="{{'sample_name1'}}" value="کد نمونه">کد نمونه</td>
                        <td><input type="hidden" name="{{'sample_name2'}}" value="نوع نمونه فسیلی">نوع نمونه فسیلی</td>
                        <td><input type="hidden" name="{{'sample_name3'}}" value="نوع کانی سنگین">نوع کانی سنگین</td>
                        <td><input type="hidden" name="{{'sample_name4'}}" value="شرایط دیگر">شرایط دیگر</td>
                    </tr>
                    @for($r=0;$r<=2;$r++)
                        <tr>
                            @for($c=0;$c<=4;$c++)
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
            @include('layouts.exams.partial.sample_body_complete')
        </tr>
    </table>
@endsection
@endif
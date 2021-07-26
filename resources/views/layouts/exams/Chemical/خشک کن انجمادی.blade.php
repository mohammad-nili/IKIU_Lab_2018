@extends('layouts.exams.main')

@section('star_points')
    ۱− بر روی هر نمونه برچسب شامل نام متقاضی ، نام نمونه و کد نمونه مربوطه درج شود. ۲− نمونه باید در ظروف در دار پلاستیکی مناسب با سطح تماس زیاد(پخش شده و نه متراکم) تحویل داده شود. ۳− حداکثر یک سوم ظرف از نمونه پر شده باشد. ۴− نمونه می بایست جامد باشد.
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
                    <td><input type="hidden" name="{{'sample_name2'}}" value="اطلاعات نمونه">اطلاعات نمونه</td>
                    <td><input type="hidden" name="{{'sample_name3'}}" value="توضیحات ضروری">توضیحات ضروری</td>
                    <td><input type="hidden" name="{{'sample_name4'}}" value="نوع حلال">نوع حلال</td>
                    <td><input type="hidden" name="{{'sample_name5'}}" value="زمان تقریبی خشک شدن">زمان تقریبی خشک شدن</td>
                    <td><input type="hidden" name="{{'sample_name6'}}" value="دما">دما</td>
                </tr>
                @for($r=0;$r<=2;$r++)
                    <tr>
                        @for($c=0;$c<=6;$c++)
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
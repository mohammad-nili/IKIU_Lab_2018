@extends('layouts.exams.main')

@section('star_points')
    ابعاد نمونه باید مناسب بوده و در غیر این صورت نیازمند برش و ایجاد تغییر در ابعاد می باشد. <br>
    آیا مشتری با تغییر سایز نمونه مخالفتی دارد؟<input type="text" name="description">
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
                        <td><input type="hidden" name="{{'sample_name2'}}" value="جنس لایه و زیر لایه(در صورت وجود)">جنس لایه و زیر لایه(در صورت وجود)</td>
                        <td><input type="hidden" name="{{'sample_name3'}}" value="آیا نمونه حساس به حرارت می باشد؟">آیا نمونه حساس به حرارت می باشد؟</td>
                        <td><input type="hidden" name="{{'sample_name4'}}" value="مانت سرد">مانت سرد</td>
                        <td><input type="hidden" name="{{'sample_name5'}}" value="مانت گرم">مانت گرم</td>
                        <td><input type="hidden" name="{{'sample_name6'}}" value="سنباده زنی تا ۸میکرومتر">سنباده زنی تا ۸میکرومتر</td>
                        <td><input type="hidden" name="{{'sample_name7'}}" value="پولیش تا ۱ میکرومتر">پولیش تا ۱ میکرومتر</td>
                        <td><input type="hidden" name="{{'sample_name8'}}" value="اچ کردن">اچ کردن</td>
                        <td><input type="hidden" name="{{'sample_name9'}}" value="تصویر برداری و آنالیز تصویر">تصویر برداری و آنالیز تصویر</td>
                    </tr>
                    @for($r=0;$r<=3;$r++)
                        <tr>
                            @for($c=0;$c<=9;$c++)
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
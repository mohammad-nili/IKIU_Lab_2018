@extends('layouts.exams.main')

@section('star_points')
    ۱− دو نمونه دستی که بایستی به ابعاد بزرگتر از ۱۰ سانتی مترباید باشد.
@endsection

@if(!isset($request->status))
@section('samples')
    <table class="table-4">
        @include('layouts.exams.partial.sample_head')
        <tr>
            <td  style="margin: 0;padding: 0">
                <table style="margin: 0;padding: 0">
                    <tr>
                        <td><input type="hidden" name="{{'sample_name0'}}" value="شماره نمونه">شماره نمونه</td>
                        <td><input type="hidden" name="{{'sample_name1'}}" value="درصد رطوبت(درصد)">درصد رطوبت(درصد)</td>
                        <td><input type="hidden" name="{{'sample_name2'}}" value="وزن نمونه خشک +استوانه قبل از آزمایش A گرم">وزن نمونه خشک +استوانه قبل از آزمایش A گرم</td>
                        <td><input type="hidden" name="{{'sample_name3'}}" value="وزن نمونه خشک +استوانه پس از مرحله اول B گرم">وزن نمونه خشک +استوانه پس از مرحله اول B گرم</td>
                        <td><input type="hidden" name="{{'sample_name4'}}" value="وزن نمونه خشک +استوانه پس از مرحله اول C گرم">وزن نمونه خشک +استوانه پس از مرحله اول C گرم</td>
                        <td><input type="hidden" name="{{'sample_name5'}}" value="وزن استوانه D گرم">وزن استوانه D گرم</td>
                        <td><input type="hidden" name="{{'sample_name6'}}" value="شاخص دوام وارفتگی">شاخص دوام وارفتگی</td>
                        <td><input type="hidden" name="{{'sample_name7'}}" value="درجه حرارت(CT)">درجه حرارت(CT)</td>
                        <td><input type="hidden" name="{{'sample_name8'}}" value="محلول مورد استفاده ">محلول مورد استفاده </td>
                        <td><input type="hidden" name="{{'sample_name9'}}" value="تویف شکل ظاهری نمونه باقیمانده در استوانه و رد شده از آن">تویف شکل ظاهری نمونه باقیمانده در استوانه و رد شده از آن</td>

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
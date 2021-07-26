@extends('layouts.exams.main')

@section('star_points')
    ابعاد زیر لایه باید حدود(۲٫۵cm*۲٫۵cm) و محدوده لایه نشانی کمتر از یک میکرومتر می باشد.
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
                        <td><input type="hidden" name="{{'sample_name2'}}" value="جنس نمونه">جنس نمونه</td>
                        <td><input type="hidden" name="{{'sample_name3'}}" value="جنس لایه و زیر لایه">جنس لایه و زیر لایه</td>
                        <td><input type="hidden" name="{{'sample_name4'}}" value="شرایط لایه نشانی">شرایط لایه نشانی</td>
                        <td><input type="hidden" name="{{'sample_name5'}}" value="دمای لایه نشانی">دمای لایه نشانی</td>
                        <td><input type="hidden" name="{{'sample_name6'}}" value="DC or RF Magneto-sputtering">DC or RF Magneto-sputtering</td>
                        <td><input type="hidden" name="{{'sample_name7'}}" value="توان مورد نیاز لایه نشانی">توان مورد نیاز لایه نشانی</td>
                        <td><input type="hidden" name="{{'sample_name8'}}" value="محیط لایه نشانی">محیط لایه نشانی</td>
                        <td><input type="hidden" name="{{'sample_name9'}}" value="ضخامت مورد نیاز">ضخامت مورد نیاز</td>
                        <td><input type="hidden" name="{{'sample_name10'}}" value="سایر مشخصات ضروری">سایر مشخصات ضروری</td>
                    </tr>
                    @for($r=0;$r<=3;$r++)
                        <tr>
                            @for($c=0;$c<=10;$c++)
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
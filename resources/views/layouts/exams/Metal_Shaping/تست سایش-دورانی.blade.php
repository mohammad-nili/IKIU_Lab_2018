@extends('layouts.exams.main')

@section('star_points')
    در انجام تست سایش نمونه به شکل پین با قطر ۵ الی ۱۰ میلی متر و ارتفاع ۷ الی ۱۵ میلی متر قابل قبول میباشد. در صورت انتخاب ساینده انتخابی، ارائه ساینده با مشتری میباشد.
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
                    <td><input type="hidden" name="{{'sample_name2'}}" value="نوع نمونه">نوع نمونه</td>
                    <td><input type="hidden" name="{{'sample_name3'}}" value="جنس نمونه">جنس نمونه</td>
                    <td><input type="hidden" name="{{'sample_name4'}}" value="سرعت تست (متر بر ثانیه) ۰٫۱ الی ۰٫۲۵">سرعت تست (متر بر ثانیه) ۰٫۱ الی ۰٫۲۵</td>
                    <td><input type="hidden" name="{{'sample_name5'}}" value="مسافت تست (متر)">مسافت تست (متر)</td>
                    <td><input type="hidden" name="{{'sample_name6'}}" value="نیروی تست (نیوتن)">نیروی تست (نیوتن)</td>
                    <td><input type="hidden" name="{{'sample_name7'}}" value="فشار تست (مگا پاسکال)">فشار تست (مگا پاسکال)</td>
                    <td><input type="hidden" name="{{'sample_name8'}}" value="جنس ساینده استاندارد یا درخواستی">جنس ساینده استاندارد یا درخواستی</td>
                    <td><input type="hidden" name="{{'sample_name9'}}" value="سایر مشخصات ضروری">سایر مشخصات ضروری</td>
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
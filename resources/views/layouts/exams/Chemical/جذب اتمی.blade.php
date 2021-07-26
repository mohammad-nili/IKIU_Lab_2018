@extends('layouts.exams.main')

@section('star_points')
    ۱− بر روی هر نمونه برچسب شامل نام متقاضی ، نام نمونه و کد نمونه مربوطه درج شود. ۲− نمونه باید به صورت محلول باشد. ۳− محلول نباید خیلی اسیدی باشد. ۴− برای نمونه هایی که گستره غلظت آنها مشخص نیست حداقل مقدار نمونه باید ۵۰ میلی لیتر باشد. ۵− برای هربار آنالیز عنصر ، هزینه ی تعداد ۵ نمونه برای کالیبراسیون محاصبه می شود. ۶− خطای ناشی از وجود ترکیبات مزاحم به عهده خود مشتری می باشد. ۷−در صورت نیاز به سنجش چند عنصر در یک نمونه هزینه هر کدام به صورت مجزا محاسبه می شود.
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
                    <td><input type="hidden" name="{{'sample_name2'}}" value="نام عنصر">نام عنصر</td>
                    <td><input type="hidden" name="{{'sample_name3'}}" value="توضیحات ضروری">توضیحات ضروری</td>
                    <td><input type="hidden" name="{{'sample_name4'}}" value="گستره غلظت">گستره غلظت</td>
                    <td><input type="hidden" name="{{'sample_name5'}}" value="حلال نمون">حلال نمون</td>
                    <td><input type="hidden" name="{{'sample_name6'}}" value="شاهد">شاهد</td>
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
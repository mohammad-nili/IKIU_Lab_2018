@extends('layouts.exams.main')

@section('star_points')
    1-حداقل مقدار نمونه 10 میلی گرم باشد. 2- برچسب روی هر نمونه باید شامل نام متقاضی،نام نمونه و سمیت احتمالی و نوع هسته مد نظر باشد. 3-ساختار احتمالی نمونه ها پیوست گردد.4-در صورت درخواست چند آنالیز مجزا از یک نمونه،می بایست ضمن تکمیل فرم مربوط به هر آنالیز،آن نمونه به صورت تفکیک شده در ظروف جداگانه به میزان نیاز برای هر آنالیز،تحویل گردد.5-اسکن عادی NMR بر مبنای 1500 پالس در دمای محیط(20-25 c) است.
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
                    <td><input type="hidden" name="{{'sample_name2'}}" value="هسته">هسته</td>
                    <td><input type="hidden" name="{{'sample_name3'}}" value="حلال">حلال</td>
                    <td><input type="hidden" name="{{'sample_name4'}}" value="شرایط">شرایط</td>
                </tr>
                @for($r=0;$r<=9;$r++)
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
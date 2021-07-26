@extends('layouts.exams.main')

@section('star_points')
    ۱− برای ART حداقل ابعاد نمونه ۵×۲۰ mm ، کاملا مسطح و فاقد زبری ، غیر فلزی و غیر شیشه ای و ترجیحا انعطاف پذیر باشد. برای DR حداکثر ابعاد نمونه ۵×۵×۱ mm باشد. نمونه های مایع کاملا آلی و بدون آب باشد. نمونه های غیر مایع بایستی کاملا خشک و عاری از هرگونه حلال باشد همچنین نمونه های بلوری بایستی به صورت پودری و حلال زدایی باشند ۲− برچسب روی هر نمونه باید شامل نام متقاضی ، نام نمونه و سمیت احتمالی باشد. ۳− در صورت درخواست چند آنالیز مجزا از یک نمونه ، می بایست ضمن تکمیل فرم مربوط به هر آنالیز ، آن نمونه بصورت تفکیک شده در ظروف جداگانه به میزان نیاز برای هر آنالیز ، تحویل گردد.
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
                    <td><input type="hidden" name="{{'sample_name2'}}" value="نام و فرمول مولکولی یا ساختاری نمونه">نام و فرمول مولکولی یا ساختاری نمونه</td>
                    <td><input type="hidden" name="{{'sample_name3'}}" value="توضیحات ضروری">توضیحات ضروری</td>
                    <td><input type="hidden" name="{{'sample_name4'}}" value="transmittance method">transmittance method</td>
                    <td><input type="hidden" name="{{'sample_name5'}}" value="ART Attenuated Total Reflectance, 650-7800cm">ART Attenuated Total Reflectance, 650-7800cm</td>
                    <td><input type="hidden" name="{{'sample_name6'}}" value="DR Diffuse Reflectance">DR Diffuse Reflectance</td>
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
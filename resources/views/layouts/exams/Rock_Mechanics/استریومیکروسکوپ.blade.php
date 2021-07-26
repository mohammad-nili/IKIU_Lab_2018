@extends('layouts.exams.main')

@section('star_points')
    ۱− مقاطع نازک از میکروفسیل ها تهیه شده باشد. ۲− برچسب روی هر نمونه باید شامل نام متقاضی ، نام نمونه باشد. ۳− نمونه های تهیه شده از میکروفسیل ها به روش تر که منجر به تهیه نمونه دگاژه(Free) از نمونه سنگی میشود. و ماکروفسیل های گیاهی جهت مطالعه پالئواکولوژی مورد مطالعه قرار می گیرند.
@endsection

@if(!isset($request->status))

@section('samples')
    <table class="table-4">
        <tr>
            <th rowspan="10" style="max-width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle" width="70px"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مشخصات&nbsp;نمونه&nbsp;و&nbsp;آزمون</span></th>
            <td>
                <span style="margin: 0 15px">نوع نمونه:</span>
                <span style="margin: 0 15px">عادی<input type="radio" checked name="sample_type" value="عادی"></span>
                <span style="margin: 0 15px">سمی<input type="radio" name="sample_type" value="سمی"></span>
            </td>
        </tr>
        <tr>
            <td  style="margin: 0;padding: 0">
                <table style="margin: 0;padding: 0">
                    <tr>
                        <td><input type="hidden" name="{{'sample_name0'}}" value="نام نمونه">نام نمونه</td>
                        <td><input type="hidden" name="{{'sample_name1'}}" value="کد نمونه">کد نمونه</td>
                        <td><input type="hidden" name="{{'sample_name2'}}" value="نوع نمونه">نوع نمونه</td>
                        <td><input type="hidden" name="{{'sample_name3'}}" value="فراوانی نمونه">فراوانی نمونه</td>
                        <td><input type="hidden" name="{{'sample_name4'}}" value="سایر مشخصات ضروری">سایر مشخصات ضروری</td>
                    </tr>
                    @for($r=0;$r<=3;$r++)
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
            <th rowspan="10" style="max-width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle" width="70px"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مشخصات&nbsp;نمونه&nbsp;و&nbsp;آزمون</span></th>
            <td>
                <span style="margin: 0 15px">نوع نمونه:</span>
                <span style="margin: 0 15px">عادی<input disabled type="radio" @if($request->sample->first()->type=='عادی') checked @endif  name="sample_type" value="عادی"></span>
                <span style="margin: 0 15px">سمی<input disabled type="radio" @if($request->sample->first()->type=='سمی') checked @endif  name="sample_type" value="سمی"></span>
            </td>
        </tr>
        <tr>
            @include('layouts.exams.partial.sample_body_complete')
        </tr>
    </table>
@endsection
@endif
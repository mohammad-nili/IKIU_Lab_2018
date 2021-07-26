@extends('layouts.exams.main')

@section('star_points')
    ۱− در صورت درخواست تکرار آزمون می بایست ضمن تکمیل فرم مربوط به هر آنالیز ، موارد از قبل اعلام گردد. ۲− برچسب روی هر نمونه باید شامل نام متقاضی ، نام نمونه و ویژگی های خاص آن باشد. ۳− چنانچه برای انجام آزمایش شرایط خاصی مد نظر باشد، کارشناس آزمایشگاه آن را تعیین و پس از اعلام به متقاضی ، هزینه آن از متقاضی اخذ خواهد شد. ۴− نمونه ها قبل از انجام آزمون می بایست هم وزن باشند.
@endsection

@if(!isset($request->status))
@section('samples')

    <table class="table-4">
        <tr>
            <th rowspan="10" style="max-width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle" width="70px"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مشخصات&nbsp;نمونه&nbsp;و&nbsp;آزمون</span></th>
            <td>
                <span style="margin: 0 15px">نوع نمونه:</span>
                <span style="margin: 0 15px">پروتئین<input type="radio" checked name="sample_type" value="پروتئین"></span>
                <span style="margin: 0 15px">DNA<input type="radio" name="sample_type" value="DNA"></span>
                <span style="margin: 0 15px">RNA<input type="radio" name="sample_type" value="RNA"></span>
            </td>
        </tr>
        <tr>
            <td  style="margin: 0;padding: 0">
                <table style="margin: 0;padding: 0">
                    <tr>
                        <td><input type="hidden" name="{{'sample_name0'}}" value="نام نمونه">نام نمونه</td>
                        <td><input type="hidden" name="{{'sample_name1'}}" value="کد نمونه">کد نمونه</td>
                        <td><input type="hidden" name="{{'sample_name2'}}" value="حجم نمونه">حجم نمونه</td>
                        <td><input type="hidden" name="{{'sample_name3'}}" value="تعداد دور در دقیقه">تعداد دور در دقیقه</td>
                        <td><input type="hidden" name="{{'sample_name4'}}" value="زمان (دقیقه)">زمان (دقیقه)</td>
                        <td><input type="hidden" name="{{'sample_name5'}}" value="دما">دما</td>
                        <td><input type="hidden" name="{{'sample_name6'}}" value="توضیحات دیگر‍">توضیحات دیگر‍</td>
                    </tr>
                    @for($r=0;$r<=3;$r++)
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
            <th rowspan="10" style="max-width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle" width="70px"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مشخصات&nbsp;نمونه&nbsp;و&nbsp;آزمون</span></th>
            <td>
                <span style="margin: 0 15px">نوع نمونه:</span>
                <span style="margin: 0 15px">پروتئین<input disabled type="radio" @if($request->sample->first()->type=='پروتئین') checked @endif name="sample_type" value="پروتئین"></span>
                <span style="margin: 0 15px">DNA<input disabled type="radio" @if($request->sample->first()->type=='DNA') checked @endif  name="sample_type" value="DNA"></span>
                <span style="margin: 0 15px">RNA<input disabled type="radio" @if($request->sample->first()->type=='RNA') checked @endif  name="sample_type" value="RNA"></span>
            </td>
        </tr>
        <tr>
            @include('layouts.exams.partial.sample_body_complete')
        </tr>
    </table>
@endsection
@endif
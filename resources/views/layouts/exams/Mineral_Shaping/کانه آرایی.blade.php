@extends('layouts.exams.main')

@section('star_points')
        نمونه پودری باید از مش ۳۲۵ عبور داده شود و نمونه باید دارای ابعاد زیر ۱ سانتیمتر × ۱ سانتیمتر باشد.
@endsection

@if(!isset($request->status))
@section('samples')

    <table class="table-4">
        <tr>
            <th rowspan="10" style="max-width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle" width="70px"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مشخصات&nbsp;نمونه&nbsp;و&nbsp;آزمون</span></th>
            <td>
                <span style="margin: 0 15px">آزمون درخواستی:</span>
                <span style="margin: 0 15px">سنگ شکن<input type="radio" checked name="sample_type" value="سنگ شکن"></span>
                <span style="margin: 0 15px">آسیا<input type="radio" name="sample_type" value="آسیا"></span>
                <span style="margin: 0 15px">جدا کننده<input type="radio" name="sample_type" value="جدا کننده"></span>
                <span style="margin: 0 15px">فلوتاسیون<input type="radio" name="sample_type" value="فلوتاسیون"></span>
            </td>
        </tr>
        <tr>
            <td  style="margin: 0;padding: 0">
                <table style="margin: 0;padding: 0">
                    <tr>
                        <td><input type="hidden" name="{{'sample_name0'}}" value="کد نمونه">کد نمونه</td>
                        <td><input type="hidden" name="{{'sample_name1'}}" value="پارامتر درخواستی">پارامتر درخواستی</td>
                        <td><input type="hidden" name="{{'sample_name2'}}" value="تعداد نمونه">تعداد نمونه</td>
                        <td><input type="hidden" name="{{'sample_name3'}}" value="توضیحات">توضیحات</td>
                    </tr>
                    @for($r=0;$r<=11;$r++)
                        <tr>
                            @for($c=0;$c<=3;$c++)
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
                <span style="margin: 0 15px">سنگ شکن<input disabled type="radio" @if($request->sample->first()->type=='سنگ شکن') checked @endif  name="sample_type" value="سنگ شکن"></span>
                <span style="margin: 0 15px">آسیا<input disabled type="radio" @if($request->sample->first()->type=='آسیا') checked @endif  name="sample_type" value="آسیا"></span>
                <span style="margin: 0 15px">جدا کننده<input disabled type="radio" @if($request->sample->first()->type=='جدا کننده') checked @endif  name="sample_type" value="جدا کننده"></span>
                <span style="margin: 0 15px">فلوتاسیون<input disabled type="radio" @if($request->sample->first()->type=='فلوتاسیون') checked @endif  name="sample_type" value="فلوتاسیون"></span>
            </td>
        </tr>
        <tr>
            @include('layouts.exams.partial.sample_body_complete')
        </tr>
    </table>
@endsection
@endif
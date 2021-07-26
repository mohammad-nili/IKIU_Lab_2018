@extends('layouts.exams.main')

@if(!isset($request->status))
@section('samples')

    <table class="table-4">
        @include('layouts.exams.partial.sample_head')
        <tr>
            <td  style="margin: 0;padding: 0">
                <table style="margin: 0;padding: 0">
                    <tr>
                        <td rowspan="2"><input type="hidden" name="{{'sample_name0'}}" value="نام نمونه">نام نمونه</td>
                        <td rowspan="2"><input type="hidden" name="{{'sample_name1'}}" value="کد نمونه">کد نمونه</td>
                        <td rowspan="2"><input type="hidden" name="{{'sample_name2'}}" value="اطلاعات نمونه">اطلاعات نمونه</td>
                        <td rowspan="2"><input type="hidden" name="{{'sample_name3'}}" value="توضیحات ضروری">توضیحات ضروری</td>
                        <td rowspan="2"><input type="hidden" name="{{'sample_name4'}}" value="Transmittance Method">Transmittance Method</td>
                        <td colspan="2">محدوده موج مورد نظر</td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="{{'sample_name5'}}" value="UV_Vis">UV_Vis</td>
                        <td><input type="hidden" name="{{'sample_name6'}}" value="IR">IR</td>
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
            @include('layouts.exams.partial.sample_head_complete')
        </tr>
        <tr>
            <td style="margin: 0;padding: 0">
                <table style="margin: 0;padding: 0">
                    <tr>
                        <td rowspan="2">نام نمونه</td>
                        <td rowspan="2">کد نمونه</td>
                        <td rowspan="2">اطلاعات نمونه</td>
                        <td rowspan="2">توضیحات ضروری</td>
                        <td rowspan="2">Transmittance Method</td>
                        <td colspan="2">محدوده موج مورد نظر</td>
                    </tr>
                    <tr>
                        <td>UV_Vis</td>
                        <td>IR</td>
                    </tr>
                    @foreach($request->sample as $sample)
                        <tr>
                            @foreach($sample->sample_attr as $attr)
                                <td class="no_m_g">{{$attr->value}}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </table>
@endsection
@endif
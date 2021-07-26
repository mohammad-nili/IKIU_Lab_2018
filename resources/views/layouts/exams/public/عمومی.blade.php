@extends('layouts.exams.main')

@section('star_points')
    مشخصات آزمون خود را به صورت کامل شرح دهید.
@endsection

@if(!isset($request->status))
@section('samples')
<?php $c=0;$r=0; ?>
    <table class="table-4">
        <tr>
        <th rowspan="10" style="max-width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle" width="70px"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مشخصات&nbsp;نمونه&nbsp;و&nbsp;آزمون</span></th>
        </tr>
        <tr>
        <td  style="margin: 0;padding: 0">
            <table style="margin: 0;padding: 0">
                @if($req_name=='عمومی')
                <span style="margin: 0 15px">نام آزمون<input required type="text" name="req_name"></span>
                <select required name="req_category">
                    <option value="شیمی">شیمی</option>
                    <option value="مکانیک سنگ">مکانیک سنگ</option>
                    <option value="کشاورزی">کشاورزی</option>
                    <option value="فیزیک">فیزیک</option>
                    <option value="مواد متالوژی">مواد متالوژی</option>
                    <option value="شکل دهی فلزات">شکل دهی فلزات</option>
                    <option value="کانه آرایی">کانه آرایی</option>
                    <option value="مواد پیشرفته">مواد پیشرفته</option>
                    <option value="مکانیک سیالات و آبیاری">مکانیک سیالات و آبیاری</option>
                    <option value="مکانیک خاک">مکانیک خاک</option>
                    <option value="زمین شناسی">زمین شناسی</option>
                </select>
                @endif
                <textarea required name="description" id="" cols="30" rows="10" style="width: 100%"></textarea>
            </table>
        </td>
    </tr>
    </table>

@endsection

@elseif(isset($request->status) && $request->status>=2)
@section('samples')
    <table class="table-4">
        <tr>
            <th style="width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">توضیحات</span></th>
            <td style="font-size: 19px;line-height: 30px">
                <span style="width: 100%">{{$request->description}}</span>
            </td>
        </tr>
    </table>
@endsection
@endif

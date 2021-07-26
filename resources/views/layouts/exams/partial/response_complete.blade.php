<table class="table-8">
    <tr>
        <th rowspan="3" style="padding: 10px 0;width: 70px;background-color: #bbbbbb;color: #000000;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">جواب&nbsp;دهی</span></th>
        <td style="font-size: 19px">
            شماره گواهینامه/نتایج:&nbsp;
            <span style="color: #4169e1;">@if($request->answer){{$request->answer->certificate_num}}@endif</span>
            تاریخ تحویل/ارسال:&nbsp;
            <span style="color: #4169e1;">@if($request->answer){{Carbon\Carbon::parse($request->answer->transfer_date)->format('d / m / Y')}}@endif</span>
            تحویل گیرنده:&nbsp;
            <span style="color: #4169e1;">@if($request->answer){{$request->answer->transferee}}@endif</span>
        </td>
    </tr>
    <tr>
        <td style="font-size: 19px">
            نحوه تحویل/ارسال:&nbsp;
            وب سایت آزمایشگاه<input type="radio" disabled @if($request->answer && $request->answer->transfer_method=='وب سایت آزمایشگاه') checked @endif value="وب سایت آزمایشگاه">&nbsp;&nbsp;
            حضوری<input type="radio" disabled @if($request->answer && $request->answer->transfer_method=='حضوری') checked @endif value="حضوری">&nbsp;&nbsp;
            نمابر<input type="radio" disabled @if($request->answer && $request->answer->transfer_method=='نمابر') checked @endif value="نمابر">&nbsp;&nbsp;
            پست الکترونیکی<input type="radio" disabled @if($request->answer && $request->answer->transfer_method=='پست الکترونیکی') checked @endif value="پست الکترونیکی">&nbsp;&nbsp;
        </td>
    </tr>
    <tr>
        <td style="font-size: 19px">
            شماره فاکتور:&nbsp;
            <span style="color: #4169e1;">@if($request->answer){{$request->answer->factor_num}}@endif</span>
        </td>
    </tr>
</table>


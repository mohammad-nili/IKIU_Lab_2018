<table class="table-6">
    <tr>
        <th rowspan="2" style="padding: 10px 0;width: 70px;background-color: #bbbbbb;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">پذیرش</span></th>
        <td style="font-size: 19px">
            نحوه تحویل:&nbsp;
            حضوری<input type="radio" disabled @if($request->reception->transfer_method=='حضوری') checked @endif name="reception_transfer_method">&nbsp;&nbsp;
            ارسال پست<input type="radio" disabled @if($request->reception->transfer_method=='ارسال پست') checked @endif name="reception_transfer_method">&nbsp;&nbsp;
            تاریخ تحویل:&nbsp;
            {{Carbon\Carbon::parse($request->reception->transfer_date)->format('d / m / Y')}}
        </td>
    </tr>
    </tr>
    <tr>
        <td style="font-size: 19px">
            نحوه پرداخت:&nbsp;
            فیش بانکی<input type="radio" disabled @if($request->reception->payment_method=='فیش بانکی') checked @endif name="payment_method">&nbsp;&nbsp;
            اینترنتی<input type="radio" disabled @if($request->reception->payment_method=='اینترنتی') checked @endif name="payment_method">&nbsp;&nbsp;
        </td>
    </tr>
</table>
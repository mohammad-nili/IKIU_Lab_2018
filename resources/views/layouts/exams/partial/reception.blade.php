<table class="table-6">
    <tr>
        <th rowspan="2" style="padding: 10px 0;width: 70px;background-color: #bbbbbb;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">پذیرش</span></th>
        <td style="font-size: 19px">
            نحوه تحویل:&nbsp;
            حضوری<input type="radio" checked name="reception_transfer_method" value="حضوری">&nbsp;&nbsp;
            ارسال پست<input type="radio" name="reception_transfer_method" value="ارسال پست">&nbsp;&nbsp;
            تاریخ تحویل:&nbsp;
            <input type="date" min="{{date('Y-m-d')}}" required name="transfer_date" class="proba dva">
        </td>
    </tr>
    </tr>
    <tr>
        <td style="font-size: 19px">
            نحوه پرداخت:&nbsp;
            اینترنتی<input type="radio" checked name="payment_method" value="اینترنتی">&nbsp;&nbsp;
            فیش بانکی<input type="radio" name="payment_method" value="فیش بانکی">&nbsp;&nbsp;
        </td>
    </tr>
</table>
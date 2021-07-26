<table class="table-8">
    <input type="hidden" name="id" value="{{$request->id}}">
    <tr>
        <th rowspan="3" style="padding: 10px 0;width: 70px;background-color: #404040;color: white;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">جواب&nbsp;دهی</span></th>
        <td style="font-size: 19px">
            شماره گواهینامه/نتایج:&nbsp;
            <input name="certificate_num" type="text" class="width-dynamic proba dva" placeholder="............................">
            تاریخ تحویل/ارسال:&nbsp;
            <input name="transfer_date" type="date" class="proba dva" placeholder="............................">
            تحویل گیرنده:&nbsp;
            <input name="transferee" type="text" class="width-dynamic proba dva" placeholder="............................">
        </td>
    </tr>
    <tr>
        <td style="font-size: 19px">
            نحوه تحویل/ارسال:&nbsp;
            وب سایت آزمایشگاه<input type="radio" name="transfer_method" value="وب سایت آزمایشگاه">&nbsp;&nbsp;
            حضوری<input type="radio" name="transfer_method" value="حضوری">&nbsp;&nbsp;
            نمابر<input type="radio" name="transfer_method" value="نمابر">&nbsp;&nbsp;
            پست الکترونیکی<input type="radio" name="transfer_method" value="پست الکترونیکی">&nbsp;&nbsp;
        </td>
    </tr>
    <tr>
        <td style="font-size: 19px">
            شماره فاکتور:&nbsp;
            <input name="factor_num" type="text" class="width-dynamic proba dva" placeholder="............................">
        </td>
    </tr>
</table>


<table class="table-5">
    <tr>
        <th rowspan="2" style="padding: 10px 0;width: 70px;background-color: #bbbbbb;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مدارک پیوست</span></th>
        <td style="font-size: 19px">
            معرفی نامه(کارت دانشجویی/کارت شناسایی/ معرفی نامه مخصوص موسسه و شرکت ها):&nbsp;
            دارد<input type="radio"  name="recommend" value="دارد">&nbsp;&nbsp;
            ندارد<input type="radio" checked name="recommend" value="ندارد">
        </td>
    </tr>
    <tr>
        <td style="font-size: 19px">
            مرجع صدور:
            <input type="text" class="width-dynamic proba dva" name="reference" value="{{old('reference')}}" placeholder="............................">
            شماره:
            <input type="text" class="width-dynamic proba dva" name="reference_num" value="{{old('reference_num')}}" placeholder="............................">
        </td>
    </tr>
</table>
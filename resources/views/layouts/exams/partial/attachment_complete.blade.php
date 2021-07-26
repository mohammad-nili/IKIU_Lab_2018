<table class="table-5">
    <tr>
        <th rowspan="2"
            style="padding: 10px 0;width: 70px;background-color: #bbbbbb;text-align: center;vertical-align: middle">
            <span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مدارک پیوست</span></th>
        <td style="font-size: 19px">
            معرفی نامه(کارت دانشجویی/کارت شناسایی/ معرفی نامه مخصوص موسسه و شرکت ها):&nbsp;
            دارد<input type="radio" disabled @if($request->attachment->first()->recommend=='دارد') checked
                       @endif name="recommend" value="دارد">&nbsp;&nbsp;
            ندارد<input type="radio" disabled @if($request->attachment->first()->recommend=='ندارد') checked
                        @endif  name="recommend" value="ندارد">
        </td>
    </tr>
    <tr>
        <td style="font-size: 19px">
            مرجع صدور:
            <span style="color: #4169e1;">{{$request->attachment->first()->reference}}</span>
            شماره:
            <span style="color: #4169e1;">{{$request->attachment->first()->reference_num}}</span>
        </td>
    </tr>
</table>

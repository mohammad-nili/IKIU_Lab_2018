<table>
    <tr>
        <th rowspan="5" style="width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مشخصات مشتری</span></th>
        <td style="flex: 1">
            <span style="flex: 1">نام و نام خانوادگی:</span>
            <span style="flex: 1;color: #4169e1;">{{$user->FL_name}}</span>
        </td>
        <td style="flex: 1">
            <span>شغل:</span>
            <span style="flex: 1;color: #4169e1;">{{$user->job}}</span>
        </td>
    </tr>
    <tr>
        <td style="flex: 1">
            <span>کد ملی:</span>
            <span style="flex: 1;color: #4169e1;">{{$user->national_number}}</span>
        </td>
        <td style="flex: 1">
            <span>نام دانشگاه/شرکت/موسسه وابسته:</span>
            <span style="flex: 1;color: #4169e1;">{{$user->dependency}}</span>
        </td>
    </tr>
    <tr>
        <td style="flex: 1">
            <span>تلفن همراه:</span>
            <span style="flex: 1;color: #4169e1;">{{$user->national_number}}</span>
        </td>
        <td style="flex: 1">
            <span>تلفن ثابت:</span>
            <span style="flex: 1;color: #4169e1;">{{$user->phone_number}}</span>
        </td>
    </tr>
    <tr>

        <td style="flex: 1">
            <span>نمابر:</span>
            <span style="flex: 1;color: #4169e1;">{{$user->landline_number}}</span>
        </td>
        <td style="flex: 1">
            <span>پست الکترونیکی:</span>
            <span style="flex: 1;color: #4169e1;">{{$user->fax}}</span>
        </td>
    </tr>
    <tr>
        <td style="flex: 1">
            <span>مقطع تحصیلی(دانشجویان):</span>
            <span style="flex: 1;color: #4169e1;">{{$user->grade}}</span>
        </td>
        <td style="flex: 1">
            <span>نام استاد راهنما(دانشجویان):</span>
            <span style="flex: 1;color: #4169e1;">{{$user->professor_name}}</span>
        </td>
    </tr>
</table>
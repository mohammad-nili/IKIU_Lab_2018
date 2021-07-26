<table>
    <tr>
        <th style="height: 150px;width: 60px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">نوع آزمون</span></th>
        <td style="flex: 1">
            <span style="margin: 0 15px">داخلی<input type="radio" disabled name="exam_type" @if($request->IN_OUT=='داخلی') checked @endif></span>
            <span style="margin: 0 15px">خارجی<input type="radio" disabled name="exam_type" @if($request->IN_OUT=='خارجی') checked @endif></span>
        </td>
    </tr>
</table>
<table class="table-6">
    <tr>
        <th rowspan="5"
            style="padding: 10px 0;width: 70px;background-color: #bbbbbb;color: #000000;text-align: center;vertical-align: middle">
            <span style="writing-mode: vertical-rl;	transform: rotate(180deg);">نظر کارشناس</span>
        </th>
        <td style="font-size: 19px">
            نوع آزمون:&nbsp;
            غیر مخرب<input type="radio" disabled @if($request->P_N=='غیر مخرب') checked @endif name="test_type" value="غیر مخرب">&nbsp;&nbsp;
            مخرب<input type="radio" disabled @if($request->P_N=='مخرب') checked @endif name="test_type" value="مخرب">&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;
            وضعیت پلمپ نمونه ها:&nbsp;
            دارد<input type="radio" disabled @if($request->plump=='دارد') checked @endif name="plump" value="دارد">&nbsp;&nbsp;
            ندارد<input type="radio" disabled @if($request->plump=='ندارد') checked @endif name="plump" value="ندارد">&nbsp;&nbsp;
            آسیب دیده<input type="radio" disabled @if($request->plump=='آسیب دیده') checked @endif name="plump" value="آسیب دیده">&nbsp;&nbsp;
        </td>
    </tr>
    <tr>
        <td style="font-size: 19px">
            وضعیت آزمون:&nbsp;
            قابل انجام<input type="radio" disabled @if($request->status!= -2) checked @endif name="test_status" value="قابل انجام">&nbsp;&nbsp;
            غیر قابل انجام<input type="radio" disabled @if($request->status==-2) checked @endif name="test_status" value="غیر قابل انجام">&nbsp;&nbsp;
            علت عدم انجام:
            <span style="color: #4169e1;">{{$request->failed_request_cause}}</span>
        </td>
    </tr>
    <tr>
        <td style="font-size: 19px">
            تایید پذیرش:&nbsp;
            شود<input type="radio" disabled @if($request->reception->reception_status=='شود') checked @endif name="reception_confirm" value="شود">&nbsp;&nbsp;
            نشود<input type="radio" disabled @if($request->reception->reception_status=='نشود') checked @endif name="reception_confirm" value="نشود">&nbsp;&nbsp;
            علت عدم پذیرش:
            <span style="color: #4169e1;">{{$request->reception->failed_reception_cause}}</span>
        </td>
    </tr>
    <tr>
        <td style="font-size: 19px">
            هزینه کل (ریال):&nbsp;
            <span style="color: #4169e1;">{{$request->reception->total_cost}}</span>&nbsp;&nbsp;
            هزینه پرداختی (ریال):&nbsp;
            <span style="color: #4169e1;">{{$request->reception->payment}}</span>
        </td>
    </tr>
    <tr>
        <td style="font-size: 19px">
            تعداد نمونه ها:&nbsp;
            <span style="color: #4169e1;">{{$request->sample->count()}}</span>&nbsp;&nbsp;
            شامل آزمون های :&nbsp;
            @foreach(\App\RequestExam::all()->where('request_id',$request->id) as $ex)
            <span style="color: #4169e1;">{{\App\Exam::where('id',$ex->exam_id)->first()->name}} ,</span>
            @endforeach
        </td>
    </tr>
</table>
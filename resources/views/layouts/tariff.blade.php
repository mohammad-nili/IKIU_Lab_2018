<style>

    table {
        direction: rtl;
        text-align: center;
        width: 100%;
        color: black;
        border-collapse: collapse;
    }

    table, td {
        text-align: center;
        padding-right: 10px;
        border: 1px solid black;
    }
    .table-9 td{
        border-left: 1px solid black;
        text-align: center;
    }
    body{
        background-color: #efefef;
    }
</style>
@if($exams->first() == null)
    <div style="text-align:right">
    <h2>تعرفه ای موجود نیست</h2>
    </div>
@else
<div class="table-wrapper" style="margin-bottom: 10px;text-align:right">
    <table>
        <thead style="background-color: #ffd134">
        <th>ردیف</th>
        <th>نام آزمایش</th>
        <th>تعرفه ی ( ریال )</th>
        <th>توضیحات</th>
        <th>دسته بندی</th>
        </thead>
        <tbody id="table">
        @foreach($exams as $exam)
        <tr>
            <td class="obname">{{++$loop->index}}</td>
            <td class="obname">{{$exam->name}}</td>
            <td class="obname">{{number_format((int)$exam->cost)}}</td>
            <td class="obname">{{$exam->description}}</td>
            <td class="obname">{{$exam->category}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endif
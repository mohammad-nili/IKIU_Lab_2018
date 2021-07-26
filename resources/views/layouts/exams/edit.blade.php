@extends('home')

@section('style')
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            color: #000;
        }
        .table-wrapper {
            box-shadow: 0 0 10px #2b2b2b;
            border-radius: 10px;
            overflow: hidden;
        }

        td, th {
            border: 1px solid rgba(255, 191, 67, 0.5);
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #ddddc1;
        }
        .table-wrapper a{color: black;}
        .table-wrapper a:hover{color: red;}
    </style>
@endsection
@section('content')

    <div class="table-wrapper" style="margin-bottom: 10px">
        <form action="{{route('UpdateExam',$exam->id)}}" method="POST">
            @csrf
            @method('PATCH')
        <table>
            <thead style="background-color: #ffd134">
            <tr>
                <td>نام آزمون</td>
                <td>{{$exam->name}}</td>
            </tr>
            <tr>
                <td>قیمت</td>
                <td><input  style="text-align: center" type="text" pattern="[0-9]{}" required name="cost" value="{{number_format($exam->cost)}}">ریال </td>
            </tr>
            <tr>
                <td>دسته بندی</td>
                <td>{{$exam->category}}</td>
            </tr>
            <tr>
                <td>توضیحات</td>
                <td>{{$exam->description}}</td>
            </tr>
            </thead>
        </table>
            <button type="submit" style="cursor: pointer;height: 40px;width: 100%;background-color: rgba(37,117,42,0.81);text-align: center;padding: 5px;margin: 5px auto;display: block;border-radius: 5px">
                <i style="color: white" class="material-icons">done</i>
            </button>
            <a href="{{route('ShowExam')}}" style="cursor: pointer;height: 40px;width: 100%;background-color: rgba(109,1,0,0.8);text-align: center;padding: 5px;margin: 5px auto;display: block;border-radius: 5px">
                <i style="color: white" class="material-icons">clear</i>
            </a>
        </form>
    </div>

@endsection

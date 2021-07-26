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

    @if ($errors->any())
        <script>
            swal("خطا", "@foreach ($errors->all() as $error){{$error.'\n'}}@endforeach", "error");
        </script>
    @endif
    @if(Session::has('sweet_alert.alert'))
        <script>
            swal({!! Session::get('sweet_alert.alert') !!});
        </script>
        {{--@endif--}}
    @endif

        <form action="{{route('AddExam')}}" method="POST">
            @csrf
            <table>
                <thead style="background-color: #ffd134">
                <tr>
                    <td>نام آزمون</td>
                    <td><input name="name" value="{{old('name')}}" required type="text" placeholder="( مثال : NMR )"></td>
                </tr>
                <tr>
                    <td>قیمت</td>
                    <td>
                        <input name="cost" value="{{old('cost')}}" required type="text" class="dollar">ریال
                    </td>
                </tr>
                <tr>
                    <td>دسته بندی</td>
                    <td>
                        <select name="category_fa" id="fa" onchange="document.getElementById('en').value = document.getElementById('fa').value">
                            @foreach($categories as $category)
                            <option value="{{$category->en}}">{{$category->fa}}</option>
                            @endforeach
                        </select>
                        <select name="category_en" id="en" onchange="document.getElementById('fa').value = document.getElementById('en').value">
                            @foreach($categories as $category)
                                <option value="{{$category->en}}">{{$category->en}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>توضیحات</td>
                    <td><input name="description" value="{{old('description')}}"  type="text" placeholder="( مثال : دارای حلال های مختلف )"></td>
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
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/0.7.17/cleave.min.js"></script>
    <script>
        new Cleave('.dollar', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand' });
    </script>
@endsection
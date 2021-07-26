@extends('home')

@section('style')
    <link rel="stylesheet" href="css/custom_table.css">
@endsection
@section('content')

    @if(Session::has('sweet_alert.alert'))
        <script>
            swal({!! Session::get('sweet_alert.alert') !!});
        </script>
    @endif

    <div class="tab">
        @foreach ($exams as $category=>$group)
            <button class="tablinks" onclick="openCity(event, '{{$category}}')">{{$group[0]->category}}</button>
        @endforeach
            <button class="tablinks">
                <a style="color: #434343;" href="{{route('RS1_show',["public","عمومی"])}}">عمومی</a>
            </button>
    </div>


    {{--@foreach($categories as $category)--}}
    @foreach ($exams as $category=>$group)
        <div id="{{$category}}" class="tabcontent">
            <div style="text-align: right">
                <h3>فرم های آزمایشگاه {{$group[0]->category}}</h3>
                <div class="tab" style="display: inline-block">
                    <button class="tablinks" onclick="{{$category}}{{'()'}}">لیست تعرفه ها</button>
                </div>
                <?php echo '<script>function '.$category.'(){window.open("'.route('tariff',[$category]).'","_blank","scrollbars=no","toolbar=no", "width=600,height=500");}</script>' ?>
            </div>
            <div class="table-wrapper" style="margin: 10px 0">
                <table>
                    <thead style="background-color: #ffd134">
                    <th>نام آزمون</th>
                    @if(\App\RolePermission::find(auth()->user()->role)->EDIT_EXAM==1)
                        <th>ویرایش</th>
                    @endif
                    </thead>
                    <tbody id="table">
                    @foreach ($exams[$category] as $exam)
                        <tr>
                            <td class="obname"><a href="{{route('RS1_show',["$category","$exam->name"])}}">فرم درخواست آزمون {{$exam->name}}</a></td>
                            @if(\App\RolePermission::find(auth()->user()->role)->EDIT_EXAM==1)
                                <td class="obname">
                                    <a href="{{route('EditExam',$exam->id)}}">
                                        <i class="material-icons">settings</i>
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach


    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

@endsection

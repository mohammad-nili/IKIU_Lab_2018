@extends('home')

@section('style')
    <style>
        .obname{
            font-size: 15px;
            text-align: center;
            color: #000000;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }
        .table-wrapper {
            box-shadow: 0 0 10px #555;
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

    @if(Session::has('sweet_alert.alert'))
        <script>
            swal({!! Session::get('sweet_alert.alert') !!});
        </script>
    @endif



    <div class="table-wrapper" style="margin-bottom: 10px">

        <table>
            <thead style="background-color: #ffd134">
            <th>نام کاربری</th>
            <th>منصب</th>
            <th>گروه</th>
            <th>ایمیل</th>
            <th>تاریخ عضویت</th>
            <th>ویرایش</th>
            </thead>
            <tbody id="table">
            @foreach($users as $user)
                <tr>
                    <td class="obname">{{$user->name}}</td>
                    <td class="obname">{{\App\RolePermission::find($user->role)->name_fa}}</td>
                    <td class="obname">{{$user->cluster}}</td>
                    <td class="obname">{{$user->email}}</td>
                    <td class="obname">{{$user->created_at}}</td>
                    <td class="obname">
                        <a href="{{route('EditUser',$user->id)}}">
                        <i class="material-icons">settings</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>

@endsection
@section('scripts')
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
@endsection
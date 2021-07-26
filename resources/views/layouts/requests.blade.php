@extends('home')

@section('style')
    <link rel="stylesheet" href="css/custom_table.css">
    <style>
        tr:nth-child(even) {
            background-color: #ddddc1;
        }
        .paid{color: #24a714;}
        .not_paid{color: red;}
        table a{
            color: #4169e1;
        }
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
                @if($user_role=='manager')
                <th>تاییدیه</th>
                @endif
                @if($user_role=='reception')
                <th>تایید فیش بانکی</th>
                @endif
                <th>شناسه</th>
                <th>نام آزمون</th>
                <th>داخلی / خارجی</th>
                <th>تعرفه ی آزمون (ریال)</th>
                <th>وضعیت پرداخت</th>
                <th>وضعیت آزمون</th>
                <th>وضعیت دریافت</th>
                <th>وضعیت تحویل</th>
                <th>مشاهده</th>
            </thead>
            <tbody id="table">
                @foreach($requests as $request)
                    <tr>
                        {{--manager accept--}}
                        @if($user_role=='manager')
                            @if($request->status==1)
                            <td class="obname">
                                <form enctype="multipart/form-data" onSubmit="return confirm('مطمئن هستید ؟');" method="post" action="{{route('RS2_M')}}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="id" value="{{$request->id}}">
                                    <input type="submit" name="action" value="✓">
                                    <input type="submit" name="action" value="✗">
                                </form>
                            </td>
                            @else<td class="obname">----</td>@endif
                        @endif
                        {{--reception accept--}}
                        @if($user_role=='reception')
                            @if($request->status==3)
                            <td class="obname">
                                <form enctype="multipart/form-data" onSubmit="return confirm('مطمئن هستید ؟');" method="post" action="{{route('RS3_R')}}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="id" value="{{$request->id}}">
                                    <input type="submit" name="action" value="✓">
                                    <input type="submit" name="action" value="✗">
                                </form>
                            </td>
                            @else<td class="obname">----</td>@endif
                        @endif
                        {{--expert accept--}}
                        @if($user_role=='expert' && $request->status==2)
                            <td class="obname">
                                <form enctype="multipart/form-data" method="post" action="{{route('RS2_show')}}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="id" value="{{$request->id}}">
                                    <input style="background-color: inherit;border: none;color: #4169e1;font-weight: bold;font-size: 15px;cursor: pointer" type="submit" value="{{crc32($request->id)}}">
                                </form>
                            </td>
                        {{--customer payment--}}
                        @elseif($user_role=='customer' && $request->status==4)
                            <td class="obname">
                                <form enctype="multipart/form-data" method="post" action="{{route('show_fake_pay')}}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="id" value="{{$request->id}}">
                                    <input style="background-color: inherit;border: none;color: #4169e1;font-weight: bold;font-size: 15px;cursor: pointer" type="submit" value="{{crc32($request->id)}}">
                                </form>
                            </td>
                        {{--endly expert response--}}
                        @elseif($user_role=='expert' && $request->status==5)
                             <td class="obname">
                                <form enctype="multipart/form-data" method="post" action="{{route('RS3_show')}}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="id" value="{{$request->id}}">
                                    <input style="background-color: inherit;border: none;color: #4169e1;font-weight: bold;font-size: 15px;cursor: pointer" type="submit" value="{{crc32($request->id)}}">
                                </form>
                            </td>
                        @else
                        <td class="obname">{{crc32($request->id)}}</td>
                        @endif
                        <td class="obname">{{$request->Name}}</td>
                        <td class="obname">{{$request->IN_OUT}}</td>
                        <td class="obname">{{isset($request->reception->total_cost) ? $request->reception->total_cost : "مشخص نشده"}}</td>
                        <td class="obname @if($request->status >=5) paid @else not_paid @endif">@if($request->status >=5)پرداخت شده@else پرداخت نشده @endif</td>
                        <td class="obname">{{my_status($request->status)}}</td>
                        <td class="obname @if($request->status >=5) paid check @else not_paid not_check @endif">@if($request->status >=5) ✓ @else ✗ @endif</td>
                        <td class="obname @if($request->status ==6) paid check @else not_paid not_check @endif">@if($request->status ==6) ✓ @else ✗ @endif</td>
                        <td>
                            <form style="width: 25px;height: 25px;margin: 0 auto" enctype="multipart/form-data" method="post" action="{{route('RS4_show')}}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="id" value="{{$request->id}}">
                                <button style="background-color: inherit;border: none;color: #4169e1;cursor: pointer;text-align: center;width: 25px;height: 25px;margin: 0;padding: 0;position: relative;" type="submit" name="submit">
                                    <i style="padding: 0;width: 25px;height: 25px;margin: 0 auto;position: relative;" class="material-icons">remove_red_eye</i>
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

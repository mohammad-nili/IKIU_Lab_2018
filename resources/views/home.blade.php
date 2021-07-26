<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>آزمایشگاه مرکزی دانشگاه بین المللی امام خمینی (ره)</title>
    <link href="{{asset('/images/lab.png')}}" type="image/gif/png" rel="icon"/>
    <link href="{{asset('/images/lab.png')}}" rel="apple-touch-icon"/>
    <link href="{{asset('/images/lab.png')}}" rel="subsection"/>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">


    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
    <link rel="stylesheet" href="{{asset('/css/material-dashboard.min.css?v=2.1.0')}}"/>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/scrollbar.css')}}">
    <script src="{{asset('/js/sweetalert.min.js')}}"></script>
    <style>
        body{
            overflow-y: scroll;
        }
        html, body {
            background-color: #fff;
            color: #6f787b;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        a{color: white;}

        *{
            direction: rtl;
            text-decoration: none;
        }
    </style>
    @yield('style')
</head>
<body class="rtl">

@php
       $user_role = \App\RolePermission::find(auth()->user()->role);
       $user_name = auth()->user()->name;
        if (auth()->user()->role==1){
        $letter_count = \App\Request::where('wait_for',auth()->user()->id)->get()->count();
        }
        elseif (auth()->user()->role==5 || auth()->user()->role==6){
        $letter_count = \App\Request::where('wait_for',auth()->user()->role)->where('cluster',auth()->user()->cluster)->get()->count();
        }
        else{$letter_count = \App\Request::where('wait_for',auth()->user()->role)->get()->count();}
@endphp

<div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="/images/sidebar.jpeg">
        <div class="logo" style="text-align:center;position:relative">
            <a href="#" class="simple-text logo-normal">
                {{$user_role->name_fa}}
            </a>
            @if(isset(auth()->user()->cluster))
                <a href="#" class="simple-text logo-normal">
                    {{ __(' گروه : ') }}{{auth()->user()->cluster}}
                </a>
            @endif
        </div>
        <div class="sidebar-wrapper" style="overflow: hidden">
            <div class="user">
                <div class="photo">
                    <img src="{{$user_role->image}}" />
                </div>
                <div class="user-info">
                    <a data-toggle="collapse" href="#collapseExample" class="username">
                        <span>{{$user_name}}</span>
                    </a>
                </div>
            </div>
            <ul class="nav">

                <li class="nav-item ">
                    <a class="nav-link" href="{{route('main')}}">
                        <i class="material-icons">home</i>
                        <p>صفحه اصلی</p>
                    </a>
                </li>

                @if($user_role->ADD_USER==1)
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#SideUser">
                            <i class="material-icons">person_add</i>
                            <p>کاربرها
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="SideUser">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('ShowUsers')}}">
                                        <i class="material-icons">&nbsp;</i>
                                        <span class="sidebar-normal">همه کاربر ها</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('AddUser')}}">
                                        <i class="material-icons">&nbsp;</i>
                                        <span class="sidebar-normal">افزودن کاربر</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#SideExams">
                        <i class="material-icons">border_color</i>
                        <p>درخواست ها
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="SideExams">
                        <ul class="nav">
                            @if($user_role->REQUEST==1)
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('ShowExam')}}">
                                    <i class="material-icons">&nbsp;</i>
                                    <span class="sidebar-normal">درخواست جدید</span>
                                </a>
                            </li>
                            @endif
                            <li class="nav-item ">
                                <a class="nav-link"   href="{{route('requests')}}">
                                    <i class="material-icons">&nbsp;</i>
                                    <span class="sidebar-normal">همه درخواست ها</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#SideReq">
                        <i class="material-icons">grid_on</i>
                        <p>آزمون ها
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="SideReq">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('ShowExam')}}">
                                    <i class="material-icons">&nbsp;</i>
                                    <span class="sidebar-normal">همه آزمون ها</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" target="_blank" href="{{route('tariff',['All'])}}">
                                    <i class="material-icons">&nbsp;</i>
                                    <span class="sidebar-normal">لیست تعرفه ها</span>
                                </a>
                            </li>
                            @if($user_role->ADD_EXAM==1)
                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('AddExam')}}">
                                    <i class="material-icons">&nbsp;</i>
                                    <span class="sidebar-normal">افزودن آزمون جدید</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="{{route('letters')}}">
                        <i class="material-icons">drafts</i>
                        <p>پیام ها
                            <span class="badge" style="float:left;background-color:#ea4135;font-size: 15px;border-radius: 15px">{{$letter_count}}</span>
                        </p>
                    </a>
                </li>
                @if($user_role->PAYMENT==1)
                <li class="nav-item ">
                    <a class="nav-link"  href="{{route('payments')}}">
                        <i class="material-icons">attach_money</i>
                        <p>پرداخت ها</p>
                    </a>
                </li>
                @endif
                <li class="nav-item ">

                        @auth
                            <a class="nav-link" data-toggle="collapse"  href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="material-icons">exit_to_app</i>
                                <p>خروج</p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth

                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel" style="background-color: #101010">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div>
                    @if($user_role->ADD_USER==1)
                    <a class="head-nav-icon" href="{{route('ShowUsers')}}">
                        <i class="material-icons">person</i>
                    </a>
                    @endif
                    <a class="head-nav-icon" href="{{route('main')}}">
                        <i class="material-icons">home</i>
                    </a>
                    <a style="background-color: #2d995b;color: white" class="head-nav-icon" href="{{route('letters')}}">
                        <span class="badge" style="color: rgb(255,255,255);font-size: 1vw">{{$letter_count}}</span>
                        <i class="material-icons">notifications</i>
                    </a>

                    <a id="back_arrow" style="display: none" class="head-nav-icon" href="javascript:history.back()">
                        <i class="material-icons">arrow_back</i>
                    </a>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <footer class="footer" style="height: 50px"></footer>

            <div style="padding: 20px;position: relative;display: block;overflow-x: scroll;background-color: #efefef;box-shadow:inset 0 5px 15px #1a1a1a,inset 0 -5px 15px #1a1a1a;min-height: 700px;">

                @yield('content')

            </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a target="_blank" href="http://labs.ikiu.ac.ir">
                                labs
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="http://ikiu.ac.ir">
                                ikiu
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right">
                    &copy;
                    <a href="#" target="_blank">powered by mopaco</a>
                </div>
            </div>
        </footer>
    </div>
</div>


<script src="{{asset('/js/jquery.min.js')}}"></script>

<script src="{{asset('/js/popper.min.js')}}"></script>
<script src="{{asset('/js/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('/js/material-dashboard.min.js?v=2.1.0')}}"></script>
<script src="{{asset('/js/script.js')}}"></script>
<script src="{{asset('/js/retina.min.js')}}"></script>
<script>
    if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
        || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
        document.getElementById('back_arrow').style.display = 'inline-block';}
</script>
@yield('scripts')
</body>
</html>

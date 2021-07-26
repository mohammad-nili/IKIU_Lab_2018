@extends('home')
@section('style')
    <link rel="stylesheet" href="/css/exam.css">
@endsection
@section('content')

    @if ($errors->any())
        <script>
            swal("پر کردن فیلد های زیر الزامی است", "@foreach ($errors->all() as $error){{$error.'\n'}}@endforeach", "error");
        </script>
    @endif

    @if(Session::has('sweet_alert.alert'))
        <script>
            swal({!! Session::get('sweet_alert.alert') !!});
        </script>
    @endif


    @if(!isset($request->status))
        {{--step 0 - درخواست--}}
        <form enctype="multipart/form-data" id="main_form" name="main_form" method="post" action="{{route('RS1')}}">
        {!! csrf_field() !!}
    @elseif(isset($request->status) && $request->status==2)
        {{--step 2 - نظر کارشناس--}}
        <form enctype="multipart/form-data" method="post" action="{{route('RS2')}}">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$request->id}}">
    @elseif(isset($request->status) && $request->status==5)
        {{--step 5 - نظر کارشناس--}}
        <form enctype="multipart/form-data" method="post" action="{{route('RS3')}}">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$request->id}}">
    @endif



        <div style="text-align: center">
            <span class="sheet_title">
                  {{"فرم درخواست آزمون "}}{{$req_name}}
                  <input type="hidden" name="req_name" value="{{$req_name}}">
                  @if(isset($req_category))
                  <input type="hidden" name="req_category" value="{{$req_category}}">
                  @endif
            </span>
        </div>


        {{--table 0--}}
        {{--مشخصات مشتری--}}
        @include('layouts.exams.partial.customer_content_complete')

        {{--table 1--}}
        {{--داخلی خارجی--}}
        @if(!isset($request->status))
            @include('layouts.exams.partial.IN_OUT')
        @else
            @include('layouts.exams.partial.IN_OUT_complete')
        @endif

        {{--table 2--}}
        {{--درخواست مشتری--}}
        @if(!isset($request->status))
            @include('layouts.exams.partial.customer_request')
        @else
            @include('layouts.exams.partial.customer_request_complete')
        @endif


        {{--table 3--}}
        {{--نکات مهم--}}
        @include('layouts.exams.partial.points')


        {{--table 4--}}
        {{--مشخصات نمونه و آزمون--}}
        <table class="table-4">
            @yield('samples')
        </table>
            @if(!isset($request->status))
                @include('layouts.exams.partial.validation')
            @endif
        {{--table 5--}}
        {{--پیوست مدارک--}}
        @if(!isset($request->status))
            @include('layouts.exams.partial.attachment')
        @else
            @include('layouts.exams.partial.attachment_complete')
        @endif


        {{--table 6--}}
        {{--پذیرش--}}
        @if(!isset($request->status))
            @include('layouts.exams.partial.reception')
        @else
            @include('layouts.exams.partial.reception_complete')
        @endif

        {{--table 7--}}
        {{--نظر کارشناس--}}
        @if(isset($request->status) && $request->status==2)
            @include('layouts.exams.partial.expert_opinion')
        @elseif(isset($request->status) && $request->status>=5)
            @include('layouts.exams.partial.expert_opinion_complete')
        @endif

        {{--table 8--}}
        {{--جواب دهی--}}
        @if(isset($request->status) && $request->status==5)
            @include('layouts.exams.partial.response')
        @elseif(isset($request->status) && $request->status>=5)
            @include('layouts.exams.partial.response_complete')
        @endif

        @if(!isset($request->status) || $request->status==2 || $request->status==5)
            <input type="submit" value="" style="background: url({{asset('/images/icon/check.png')}}) no-repeat center center;cursor: pointer;height: 40px;width: 100%;background-color: #757575;text-align: center;margin: 0 auto;display: block;border-radius: 5px">
    </form>
        @endif
    {{--end of form--}}
@endsection
@section('scripts')
    <script src="/js/input.js"></script>
    <script>
        let inputs = document.getElementsByTagName('input');
        inputs = Array.from(inputs);
        inputs.map(i => {
            if(i.type === 'text'){
                i.setAttribute('maxLength', 50)
            }
        })
    </script>
@endsection
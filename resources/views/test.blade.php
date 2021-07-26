@extends('home')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <a style="color: red" href="" class="button" data-id="1">Delete</a>
    {{--<script>--}}
        {{--$(document).on('click', '.button', function (e) {--}}
            {{--e.preventDefault();--}}
            {{--var id = $(this).data('id');--}}
            {{--swal({--}}
                    {{--title: "Are you sure!",--}}
                    {{--type: "error",--}}
                    {{--confirmButtonClass: "btn-danger",--}}
                    {{--confirmButtonText: "Yes!",--}}
                    {{--showCancelButton: true,--}}
                {{--},--}}
                {{--function() {--}}
                    {{--$.ajax({--}}
                        {{--type: "POST",--}}
                        {{--url: "{{route('test')}}",--}}
                        {{--data: {id:id},--}}
                        {{--success: function (data) {--}}
                            {{--//--}}
                        {{--}--}}
                    {{--});--}}
                {{--});--}}
        {{--});--}}
    {{--</script>--}}
    {{--<script>--}}
        {{--swal({--}}
            {{--title:"پرداخت با موفیقت صورت گرفت",--}}
            {{--text:"لطفا در اسرع وقت نمونه های خود را برای آزمایشگاه ارسال نمایید",--}}
            {{--icon:"success",--}}
            {{--buttons:{confirm:'باشه',},--}}
            {{--dangerMode:!1,--}}
        {{--}).then(()=>{swal({--}}
            {{--title:"آیا رسید میخواهید؟",--}}
            {{--icon:"info",--}}
            {{--buttons:{confirm:'بلی',cancel:'خیر'},--}}
        {{--}).then((isConfirm)=>{if(isConfirm){--}}
            {{--$.ajax({--}}
                {{--type: "POST",--}}
                {{--url: "{{route('test')}}",--}}
                {{--data: {id:id},--}}
                {{--success: function (data) {--}}
                    {{--//--}}
                {{--}--}}
            {{--});--}}
            {{--swal({--}}
            {{--title:"نوع دریافت رسید را انتخاب کنید",--}}
            {{--icon:"info",--}}
            {{--buttons:{mail:'ایمیل',post:'همراه نمونه ها'},--}}
        {{--})}else{}})});--}}
    {{--</script>--}}

                {{--<script>--}}
                    {{--swal("", "برای درخواست آزمون باید اطلاعات خود را تکمیل کنید", "info");--}}
                {{--</script>--}}

@endsection
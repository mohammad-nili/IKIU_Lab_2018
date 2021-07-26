<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Customer;
use App\Exam;
use App\Reception;
use App\RolePermission;
use App\Sample;
use App\Sample_attr;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_fake_pay(Request $request)
    {
        $request = \App\Request::find($request)->first();
        return view('layouts.melat',compact('request'));
    }
    public function fake_pay(Request $request)
    {

        $req =\App\Request::find($request->input('request_id'));
        $req->update(['status'=> 5,'wait_for'=> 6]);

        $req->reception->update(['payment'=>$req->reception->total_cost]);

        // آیا رسید می خواهید در دیتابیس ثبت نمی شود.
//        نوع دریافت رسید در دیتابیس ثبت نمی شود.
        $pay_alert = '<script>swal({title:"پرداخت با موفیقت صورت گرفت",text:"لطفا در اسرع وقت نمونه های خود را برای آزمایشگاه ارسال نمایید",icon:"success",buttons:{confirm:\'باشه\',},dangerMode:!1,}).then(()=>{swal({title:"آیا رسید میخواهید؟",icon:"info",buttons:{confirm:\'بلی\',cancel:\'خیر\'},}).then((isConfirm)=>{if(isConfirm){swal({title:"نوع دریافت رسید را انتخاب کنید",icon:"info",buttons:{mail:\'ایمیل\',post:\'همراه نمونه ها\'},})}else{}})});</script>';
        return redirect()->route('main')->with('pay_alert',$pay_alert);

    }

    public function show_all_requests()
    {
        $user_role = RolePermission::find( \auth()->user()->role)->name;
        if ($user_role=='customer'){
            $requests = \auth()->user()->request->all();
        }elseif($user_role=='manager' || $user_role=='expert'){
            $requests = \App\Request::where('cluster',\auth()->user()->cluster)->orderBy('updated_at', 'desc')->get();
        }else{
            $requests = \App\Request::all();
        }
        return view('layouts.requests',compact('requests','user_role'));
    }

    public function letters()
    {
        $user_role = RolePermission::find( \auth()->user()->role)->name;
        $requests = $this->let();
        return view('layouts.requests',compact('requests','user_role'));
    }

    public function let()
    {
        if (auth()->user()->role==1){
            $requests = \App\Request::where('wait_for',auth()->user()->id)->get();
        }
        elseif (auth()->user()->role==5 || auth()->user()->role==6){
            $requests = \App\Request::where('wait_for',auth()->user()->role)->where('cluster',auth()->user()->cluster)->get();
        }else{
            $requests = \App\Request::where('wait_for',auth()->user()->role)->get();
        }
        return $requests;
    }

    public function tariff($category)
    {
        $exams= \App\Exam::all();
        if ($category!='All'){
            $exams = $exams->where('category_en',$category);
        }
        return view('layouts.tariff',compact('exams'));
    }

    public function payments(Request $request)
    {
        $category = $request['pay_category'];
        $date = $request['pay_date'];

        if (isset($date) && $date!='all'){$date = date("Y-m-d h:i:s", strtotime("-1 ".$request['pay_date']));}
        else{ $date = '';}
        $payments = \App\Reception::join('request', 'reception.request_id', '=', 'request.id')
            ->select('reception.*','request.cluster')
            ->where('reception.updated_at','>',$date)
            ->where('payment','<>','');
        if (isset($category) && $category!='all'){$payments =$payments->where('cluster',$category);}

        $payments =$payments->orderBy('updated_at', 'desc')->get();

        return view('layouts.payment', compact('payments'));
    }

}

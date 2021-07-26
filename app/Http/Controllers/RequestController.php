<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Attachment;
use App\Customer;
use App\Exam;
use App\Reception;
use App\RequestExam;
use App\Sample;
use App\Sample_attr;
use Illuminate\Http\Request;

class RequestController extends Controller
{

    public function RS0_show()
    {
        return view('auth.pro_register');
    }
    public function RS0(Request $request)
    {

        $this->validate($request, [
            'FL_name' => 'required',
            'job' => 'required',
            'national_number' => 'required|numeric',
            'dependency' => 'required',
            "phone_number" => "required|numeric|regex:/(09)[0-9]{9}/",
            "landline_number" => "required|numeric|regex:/(0)[0-9]{10,11}/",
            "fax" => "required|numeric|regex:/[0-9]{8,12}/",
            "email" => "required|email",
        ]);


        $customer = new Customer();

        $customer->user_id = \auth()->user()->id;
        $customer->FL_name              = $request->input('FL_name');
        $customer->job                  = $request->input('job');
        $customer->national_number      = $request->input('national_number');
        $customer->dependency           = $request->input('dependency');
        $customer->phone_number         = $request->input('phone_number');
        $customer->landline_number      = $request->input('landline_number');
        $customer->fax                  = $request->input('fax');
        $customer->email                = $request->input('email');
        $customer->grade                = $request->input('grade');
        $customer->professor_name       = $request->input('professor_name');
        $customer->save();

        alert()->success('اکنون میتوانید آزمون خود را انتخاب نمایید','اطلاعات شما با موفقیت ثبت شد')->autoclose(3500);
        return redirect()->route('ShowExam');
    }

    public function RS1_show($category_en,$req_name)
    {

        $user = auth()->user()->customer;
        if($category_en!='public'){
            $req_category = Exam::where('category_en',$category_en)->first()->category;
            if(view()->exists('layouts.exams.'.$category_en.'.'.$req_name)){
                return view('layouts.exams.'.$category_en.'.'.$req_name,compact('user','req_name','req_category'));
            }else{
                return view('layouts.exams.public.عمومی',compact('user','req_name','req_category'));
            }
        }else{
            return view('layouts.exams.public.عمومی',compact('user','req_name'));
        }

    }
    public function RS1(Request $request)
    {

        $req = new \App\Request();
        $req->user_id = \auth()->user()->id;
        $req->Name = $request->input('req_name');
        $req->cluster = $request->input('req_category');
        $req->description = $request->input('description');
        $req->request_type = $request->input('customer_req');
        $req->IN_OUT = $request->input('exam_type');

        // expert accept
        if ( $req->IN_OUT =='خارجی'){
            $req->status = 2;
            $req->wait_for = 6;
        }
        // manager accept
        else{
            $req->status = 1;
            $req->wait_for = 5;
        }

        $req->test_condition = $request->input('test_condition');
        $req->storage_time = $request->input('storage_time');
        $req->suggest_method = $request->input('suggest_method');
        $req->request_description = $request->input('request_description');
        $req->natural_person = $request->input('natural_person');
        $req->legal_person = $request->input('legal_person');


        $req->save();

        $Sample_rows= $request->input('loop_rows');
        $Sample_column= $request->input('loop_columns');

//        //counting fulled rows
//        for( $i=0 ; $i<=9 ;$i++){
//            if($request->input('sample_value'.$i.'_0')!= null) {$Sample_rows++;}
//        }
//        //counting fulled columns
//        for( $i=0 ; $i<=35 ;$i++){
//            if($request->input('sample_value'.'0_'.$i)!= null) {$Sample_column++;}
//        }

        for( $r=0 ; $r<$Sample_rows ;$r++){
            if($request->input('sample_value'.$r.'_0')!= null) {
                $sample = new Sample();
                $sample->request_id = $req->id;
                $sample->type = $request->input('sample_type');
                $sample->save();

                for( $c=0 ; $c<$Sample_column ;$c++) {
                    $sample_attr = new Sample_attr();
                    $sample_attr->sample_id = $sample->id;
                    $sample_attr->name = $request->input('sample_name'.$c);
                    $sample_attr->value = $request->input('sample_value'.$r.'_'.$c);
                    $sample_attr->save();
                }
            }
        }

        $reception = new Reception();
        $reception->request_id = $req->id;
        $reception->sample_count = $Sample_rows;
        $reception->transfer_method = $request->input('reception_transfer_method');
        $reception->payment_method = $request->input('payment_method');
        $reception->transfer_date = $request->input('transfer_date');
        $reception->save();

        $attachment = new Attachment();
        $attachment->request_id = $req->id;
        $attachment->recommend = $request->input('recommend');
        $attachment->reference = $request->input('reference');
        $attachment->reference_num = $request->input('reference_num');
        $attachment->save();

        if ( $req->IN_OUT =='خارجی')
            if ($request->input('payment_method')=='فیش بانکی')
                alert()->success('برای ادامه فیش بانکی خود را به دفتر آزمایشگاه ارایه دهید','شناسه : '.crc32($req->id))->persistent('Close');
            else
            alert()->success('منتظر نظر کارشناس بمانید','درخواست شما با موفقیت ارسال شد');
        else
        {
            if ($request->input('payment_method')=='فیش بانکی')
                alert()->success('برای ادامه شناسه ی خود را به مدیر گروه اعلام نمایید سپس فیش بانکی را به دفتر آزمایشگاه ارایه دهید.','شناسه : '.crc32($req->id))->persistent('Close');
            else
                alert()->success('برای ادامه شناسه ی خود را به مدیر گروه اعلام نمایید.','شناسه : '.crc32($req->id))->persistent('Close');
        }

        return redirect()->route('requests');
    }
    public function RS2_M(Request $request){

        $req =\App\Request::find($request->input('id'));
        $action = $request->input('action');
        if ($action=="✓" && $req->IN_OUT=="داخلی"){
            $req->update(['status'=> 2,'wait_for'=>6]);
            alert()->success('با موفقیت آزمون داخلی تایید گردید');
        }
        elseif($action=="✗"){
            $req->update(['status'=> -2,'wait_for'=>0]);
            alert()->warning('آزمون متوقف شد');
        }

        return redirect()->route('requests');
    }

    public function RS2_show(Request $req)
    {
        $request = \App\Request::find($req->input('id'));
        $req_name = $request->Name;
        $category_en = Exam::where('category',$request->cluster)->first()->category_en;
        $tags = Exam::where('category_en',$category_en)->get();
        $user = $request->user->customer;
        if(view()->exists('layouts.exams.'.$category_en.'.'.$req_name)){
            return view('layouts.exams.'.$category_en.'.'.$req_name,compact('request','category_en','user','tags','req_name'));
        }else{
            return view('layouts.exams.public.عمومی',compact('request','category_en','user','tags','req_name'));
        }
    }

    public function RS2(Request $request)
    {
        $this->validate($request, [
            'P_N'                      => 'required',
            'plump'                    => 'required',
            'test_status'              => 'required',
            'reception_confirm'        => 'required',
        ]);

        $req = \App\Request::where('id',$request->input('id'))->first();

        if (isset($request['exams'])) {
            foreach ($request->input('exams') as $exam) {
                $ex = new RequestExam();
                $ex->exam_id = explode("-", $exam)[1];
                $ex->request_id = $req->id;
                $ex->save();
            }
        }

        $req->update(['P_N'=> $request->input('P_N'),'plump'=> $request->input('plump')]);
        if ($request->input('test_status')=='قابل انجام'){
            if ($req->reception->payment_method=='اینترنتی'){$status=4;$wait_for = $req->user_id;}
            elseif ($req->reception->payment_method=='فیش بانکی'){$status=3;$wait_for = 7;}
        }
        elseif ($request->input('test_status')=='غیر قابل انجام'){$status=-2;$wait_for = 0;}
        if ($req->IN_OUT == 'داخلی'){$status=5;$wait_for = 6;}
        $req->update(['status'=> $status,'wait_for'=> $wait_for,'failed_request_cause'=>$request->input('failed_request_cause')]);

        $req->reception->update(['reception_status'=>$request->input('reception_confirm'),'failed_reception_cause'=>$request->input('failed_reception_cause'),'total_cost'=>$request->input('cost')]);
        if ($req->IN_OUT == 'داخلی'){$req->reception->update(['total_cost'=>$request->input('cost'),'payment'=>0]);}

        alert()->success('فرم تایید شده برای درخواست کننده ارسال شد','تایید موفقیت آمیز')->autoclose(3500);
        return redirect()->route('main');
    }
    public function RS3_R(Request $request){

        $req =\App\Request::find($request->input('id'));
        $action = $request->input('action');
        if ($action=="✓"){
            $req->update(['status'=> 5,'wait_for'=>6]);
            alert()->success('با موفقیت آزمون فیش بانکی دریافت شد');
        }
        elseif($action=="✗"){
            $req->update(['status'=> -2,'wait_for'=>0]);
            alert()->warning('آزمون متوقف شد');
        }

        return redirect()->route('requests');
    }

    public function RS3_show(Request $request)
    {
        $request = \App\Request::find($request->input('id'));
        $category_en = Exam::where('category',$request->cluster)->first()->category_en;
        $user = $request->user->customer;
        $req_name = $request->Name;
        if (view()->exists('layouts.exams.'.$category_en.'.'.$req_name)){
            return view('layouts.exams.'.$category_en.'.'.$req_name,compact('request','user','req_name'));
        }else{
            return view('layouts.exams.public.عمومی',compact('request','user','req_name'));
        }
    }


    public function RS3(Request $req)
    {
        $request = \App\Request::find($req->input('id'));

        $answer = new  Answer();

        $answer->request_id 	     =  $request->id;
        $answer->certificate_num 	 =  $req->input('certificate_num');
        $answer->transfer_date       =  $req->input('transfer_date');
        $answer->transfer_method     =  $req->input('transfer_method');
        $answer->transferee          =  $req->input('transferee');
        $answer->factor_num          =  $req->input('factor_num');

        $answer->save();
        $request->update(['status'=> 6,'wait_for'=> 0]);
        alert()->success('درخواست با موفقیت تکمیل شد.','تکمیل درخواست : ')->persistent('Close');
        return redirect()->route('requests');
    }


    public function RS4_show(Request $request)
    {
        $request = \App\Request::where('id',$request->input('id'))->first();
        $request->status=6;
        $category_en = Exam::where('category',$request->cluster)->first()->category_en;
        $user = $request->user->customer;
        $req_name = $request->Name;
//        dd($request->answer);
        if (view()->exists('layouts.exams.'.$category_en.'.'.$req_name)){
            return view('layouts.exams.'.$category_en.'.'.$req_name,compact('request','user','req_name'));
        }else{
            return view('layouts.exams.public.عمومی',compact('request','user','req_name'));
        }
    }

}

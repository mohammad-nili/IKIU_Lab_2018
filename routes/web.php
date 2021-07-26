<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Larabookir\Gateway\Gateway;
Auth::routes();


Route::middleware('auth')->group(function () {

    Route::get('/',function(){return view('layouts.main');})->name('main');


    Route::get('/darkhast',function(){
        try {
            $client = new soapclient("‫‪https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl‬‬");
            dd($client);
            $gateway = \Gateway::mellat();
            $gateway->setCallback(url('callback/from/bank'));
            $gateway->price(1000)->ready();
            $refId =  $gateway->refId();
            $transID = $gateway->transactionId();
// Your code here
            return $gateway->redirect();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    });

    Route::any('callback/from/bank',function(){
        try {
            $gateway = \Gateway::verify();
            $trackingCode = $gateway->trackingCode();
            $refId = $gateway->refId();
            $cardNumber = $gateway->cardNumber();
// عملیات خرید با موفقیت انجام شده است
// در اینجا کالا درخواستی را به کاربر ارائه میکنم
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    });


    Route::get('/test',function (){
       return view('test');
    });
    Route::post('/test',function (){
       dd('ada');
    })->name('test');


//----request step 0-customer--//
    Route::get('/completeRegister','RequestController@RS0_show')->name('RS0_show')->middleware(['CheckCustomer']);
    Route::post('/completeRegister','RequestController@RS0')->name('RS0')->middleware(['CheckCustomer']);
//---------request step 1 --customer-----//
    Route::get('/exam/{category}/{req_name}','RequestController@RS1_show')->name('RS1_show')->middleware(['CheckCustomer','Register_customer']);
    Route::post('/exam','RequestController@RS1')->name('RS1')->middleware(['CheckCustomer','Register_customer']);
//---------request step 2 --manager-----//
    Route::post('/manager_accept','RequestController@RS2_M')->name('RS2_M')->middleware(['CheckManager']);
//---------request step 2 --expert-----//
    Route::post('/exam-step-2/show','RequestController@RS2_show')->name('RS2_show')->middleware(['CheckExpert']);
    Route::post('/exam-step-2/expert_accept','RequestController@RS2')->name('RS2')->middleware(['CheckExpert']);
//---------request step 2 --payment-----//
    Route::post('/show_fake_pay','HomeController@show_fake_pay')->name('show_fake_pay')->middleware(['CheckCustomer','Register_customer']);
    Route::post('/fake_pay','HomeController@fake_pay')->name('fake_pay')->middleware(['CheckCustomer','Register_customer']);
//---------request step 3 --reception-----//
    Route::post('/reception_accept','RequestController@RS3_R')->name('RS3_R')->middleware(['CheckReception']);
//---------request step 3 --complete-----//
    Route::post('/exam-step-3/show','RequestController@RS3_show')->name('RS3_show')->middleware(['CheckExpert']);
    Route::post('/exam-step-3/expert_accept','RequestController@RS3')->name('RS3')->middleware(['CheckExpert']);
//-------show step every time-----//
    Route::post('/exam/show','RequestController@RS4_show')->name('RS4_show');


    Route::get('/users','UserController@show')->name('ShowUsers')->middleware(['CheckBoss']);
    Route::get('/editUser={id}','UserController@edit')->name('EditUser')->middleware(['CheckBoss']);
    Route::patch('/UpdateUser/{user}','UserController@update')->name('UpdateUser')->middleware(['CheckBoss']);
    Route::get('/AddUser','UserController@create')->name('AddUser')->middleware(['CheckBoss']);
    Route::post('/AddUser','UserController@store')->name('AddUser')->middleware(['CheckBoss']);

    Route::get('/AllExam','ExamController@show')->name('ShowExam');
    Route::get('/editExam={id}','ExamController@edit')->name('EditExam')->middleware(['CheckBoss']);
    Route::patch('/UpdateExam/{exam}','ExamController@update')->name('UpdateExam')->middleware(['CheckBoss']);
    Route::get('/AddExam','ExamController@create')->name('AddExam')->middleware(['CheckBoss']);
    Route::post('/AddExam','ExamController@store')->name('AddExam')->middleware(['CheckBoss']);


    Route::get('/letters','HomeController@letters')->name('letters');
    Route::get('/payments','HomeController@payments')->name('payments')->middleware(['NotCustomer']);
    Route::get('/tariff/{category}','HomeController@tariff')->name('tariff');
    Route::get('/AllRequests','HomeController@show_all_requests')->name('requests');
});


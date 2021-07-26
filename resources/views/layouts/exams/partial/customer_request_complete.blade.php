<table class="table-2">
    <tr>
        <th rowspan="5"
            style="width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle">
            <span style="writing-mode: vertical-rl;	transform: rotate(180deg);">درخواست مشتری</span></th>
        <td>
                    <span style="margin: 0 15px">آزمون<input disabled type="radio"
                                                             @if($request->request_type=='آزمون') checked
                                                             @endif name="customer_req" value="آزمون"></span>
            <span style="margin: 0 15px">آماده سازی<input disabled type="radio"
                                                          @if($request->request_type=='آماده سازی') checked
                                                          @endif name="customer_req" value="آماده سازی"></span>
            <span style="margin: 0 15px">استفاده از تجهیزات جانبی<input disabled type="radio"
                                                                        @if($request->request_type=='استفاده از تجهیزات جانبی') checked
                                                                        @endif name="customer_req"
                                                                        value="استفاده از تجهیزات جانبی"></span>
            <span style="margin: 0 15px">عودت باقی ماند نمونه<input disabled type="radio"
                                                                    @if($request->request_type=='عودت باقی ماند نمونه') checked
                                                                    @endif name="customer_req"
                                                                    value="عودت باقی ماند نمونه"></span>
            <span style="margin: 0 15px">صدور فاکتور<input disabled type="radio"
                                                           @if($request->request_type=='صدور فاکتور') checked
                                                           @endif name="customer_req"
                                                           value="صدور فاکتور"></span>
        </td>
    </tr>
    <tr>
        <td>
            <span style="width: 50%;min-width: 50%">* شرایط خاص نمونه(نگهداری،حمل و نقل،انبارش):</span>
            <span style="flex: 1;color: #4169e1;">{{$request->test_condition}}</span>
        </td>
    </tr>
    <tr>
        <td>
            <span>* مدت زمان نگهداری نمونه قبل از آنالیز</span>
            <span style="flex: 1;color: #4169e1;">{{$request->storage_time}}</span>
            <span>روز *روش استاندارد پیشنهادی:</span>
            <span style="flex: 1;color: #4169e1;">{{$request->suggest_method}}</span>
        </td>
    </tr>
    <tr>
        <td>
            <span>* شرح درخواست:</span>
            <span style="flex: 1;color: #4169e1;">{{$request->request_description}}</span>
        </td>
    </tr>
    <tr>
        <td>
            <span>* مخاطب فاکتور (حقوقی):</span>
            <span style="flex: 1;color: #4169e1;">{{$request->legal_person}}</span>
            <span>نام متقاضی در فاکتور (حقیقی):</span>
            <span style="flex: 1;color: #4169e1;">{{$request->natural_person}}</span>
        </td>
    </tr>
</table>
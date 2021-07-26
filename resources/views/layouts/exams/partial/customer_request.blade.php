<table class="table-2">
    <tr>
        <th rowspan="6" style="width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">درخواست مشتری</span></th>
        <td>
            <span style="margin: 0 15px">آزمون<input type="radio" checked name="customer_req" value="آزمون"></span>
            <span style="margin: 0 15px">آماده سازی<input type="radio" name="customer_req" value="آماده سازی"></span>
            <span style="margin: 0 15px">استفاده از تجهیزات جانبی<input type="radio" name="customer_req" value="استفاده از تجهیزات جانبی"></span>
            <span style="margin: 0 15px">عودت باقی ماند نمونه<input type="radio" name="customer_req" value="عودت باقی ماند نمونه"></span>
            <span style="margin: 0 15px">صدور فاکتور<input type="radio" name="customer_req" value="صدور فاکتور"></span>
        </td>
    </tr>
    <tr>
        <td>
            <span style="width: 50%;min-width: 50%"><i style="color: red">*</i> شرایط خاص نمونه(نگهداری،حمل و نقل،انبارش):</span>
            <input type="text" class="width-dynamic proba dva" name="test_condition" value="{{old('grade')}}" placeholder="............................">
        </td>
    </tr>
    <tr>
        <td>
            <span><i style="color: red">*</i>مدت زمان نگهداری نمونه قبل از آنالیز </span>
            <input type="text" maxlength="3" name="storage_time" value="{{old('storage_time')}}" style="width: 50px;min-width: 50px" placeholder=".............">
            <span>روز</span>
        </td>
    </tr>
    <tr>
        <td>
            <span><i style="color: red">*</i>روش استاندارد پیشنهادی: </span>
            <input type="text" class="width-dynamic proba dva" name="suggest_method" value="{{old('suggest_method')}}" placeholder="............................">
        </td>
    </tr>
    <tr>
        <td>
            <span><i style="color: red">*</i>شرح درخواست: </span>
            <input type="text" class="width-dynamic proba dva" name="request_description" value="{{old('request_description')}}" placeholder="............................">
        </td>
    </tr>
    <tr>
        <td>
            <span><i style="color: red">*</i>مخاطب فاکتور (حقوقی): </span>
            <input type="text" class="width-dynamic proba dva" name="legal_person" required oninvalid="this.setCustomValidity('نام مخاطب حقوقی را وارد نمایید.')" value="{{old('legal_person')}}" placeholder="............................">
            <span><i style="color: red">*</i>نام متقاضی در فاکتور (حقیقی): </span>
            <input type="text" class="width-dynamic proba dva" name="natural_person" required oninvalid="this.setCustomValidity('نام متقاضی حقیقی را وارد نمایید.')" value="{{old('natural_person')}}" placeholder="............................">
        </td>
    </tr>
</table>
<th rowspan="10" style="max-width: 70px;background-color: #bbbbbb;font-weight: bold;text-align: center;vertical-align: middle" width="70px"><span style="writing-mode: vertical-rl;	transform: rotate(180deg);">مشخصات&nbsp;نمونه&nbsp;و&nbsp;آزمون</span></th>
<td>
    <span style="margin: 0 15px">نوع نمونه:</span>
    <span style="margin: 0 15px">عادی<input disabled type="radio"
                                            @if($request->sample->first()) @if($request->sample->first()->type=='عادی') checked
                                            @endif @endif name="sample_type" value="عادی"></span>
    <span style="margin: 0 15px">سمی<input disabled type="radio"
                                           @if($request->sample->first()) @if($request->sample->first()->type=='سمی') checked
                                           @endif @endif  name="sample_type" value="سمی"></span>
    <span style="margin: 0 15px">قابل انفجار یا اشتعال<input disabled type="radio"
                                                             @if($request->sample->first()) @if($request->sample->first()->type=='قابل انفجار یا اشتعال') checked
                                                             @endif @endif  name="sample_type"
                                                             value="قابل انفجار یا اشتعال"></span>
    <span style="margin: 0 15px">رادیواکتیو<input disabled type="radio"
                                                  @if($request->sample->first()) @if($request->sample->first()->type=='رادیواکتیو') checked
                                                  @endif @endif name="sample_type" value="رادیواکتیو"></span>
</td>
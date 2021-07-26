
<input type="hidden" value="{{$request->id}}" name="req_id">
<table class="table-6">
    <tr>
        <th rowspan="4"
            style="padding: 10px 0;width: 70px;background-color: #404040;color: white;text-align: center;vertical-align: middle">
            <span style="writing-mode: vertical-rl;	transform: rotate(180deg);">نظر کارشناس</span>
        </th>
        <td style="font-size: 19px">
            نوع آزمون:&nbsp;
            غیر مخرب<input type="radio" checked name="P_N" value="غیر مخرب">&nbsp;&nbsp;
            مخرب<input type="radio"  name="P_N" value="مخرب">&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;
            وضعیت پلمپ نمونه ها:&nbsp;
            دارد<input type="radio" checked name="plump" value="دارد">&nbsp;&nbsp;
            ندارد<input type="radio" name="plump" value="ندارد">&nbsp;&nbsp;
            آسیب دیده<input type="radio" name="plump" value="آسیب دیده">&nbsp;&nbsp;
        </td>
    </tr>
    <tr>
        <td style="font-size: 19px">
            وضعیت آزمون:&nbsp;
            قابل انجام<input type="radio" checked name="test_status" value="قابل انجام">&nbsp;&nbsp;
            غیر قابل انجام<input type="radio" name="test_status" value="غیر قابل انجام">&nbsp;&nbsp;
            علت عدم انجام:
            <input type="text" name="failed_request_cause" class="width-dynamic proba dva"
                   placeholder="............................">
        </td>
    </tr>
    <tr>
        <td style="font-size: 19px">
            تایید پذیرش:&nbsp;
            شود<input type="radio" checked name="reception_confirm" value="شود">&nbsp;&nbsp;
            نشود<input type="radio" name="reception_confirm" value="نشود">&nbsp;&nbsp;
            علت عدم پذیرش:
            <input type="text" name="failed_reception_cause" class="width-dynamic proba dva"
                   placeholder="............................">
        </td>
    </tr>
    <tr>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="//harvesthq.github.io/chosen/chosen.jquery.js"></script>
        <link rel="stylesheet" href="https://harvesthq.github.io/chosen/chosen.css">

        <td style="font-size: 19px">
            هزینه کل (ریال):&nbsp;
            <input type="text" id="pay" required name="cost" class="width-dynamic proba dva" placeholder="............................">
            <span id="output"></span>
            <select class="dollar chosen-select" id="radio_tags" multiple="multiple" name="exams[]" onchange="make_cost()">
                @foreach($tags as $tag)
                    <option value="{{$tag->cost}}-{{$tag->id}}">
                       <span>{{$tag->name}}</span>
                       <span>{{number_format((int)$tag->cost)}}{{ __(' ریال ') }}</span>
                       <span>{{$tag->description}}</span>
                    </option>
                @endforeach
            </select>
            <script>
                function make_cost() {
                    var sum = $('#radio_tags').val();
                    if (sum!=null){
                        sum = sum.map(function(item) {return parseInt(item.split("-")[0])}).reduce(add,0);
                        function add(accumulator, a) {return accumulator + a;}
                        document.getElementById('pay').value = sum;
                    }else {
                        document.getElementById('pay').value = '';
                    }
                }
            </script>
            <script>
                document.getElementById('output').innerHTML = location.search;
                $(".dollar").chosen();
            </script>
            <button style=" margin: 5px;padding: 5px;border: 1px solid #FFBF43;background-color: #1a1a1a;box-shadow: 0 0 5px #1a1a1a;border-radius: 5px;">
                <a style="color: #b8b8b8;" target="_blank" href="{{route('tariff',[$category_en])}}"><i class="large material-icons">attach_money</i></a>
            </button>
        </td>
    </tr>
</table>
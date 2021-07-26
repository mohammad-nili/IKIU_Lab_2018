<td style="margin: 0;padding: 0">
    <table style="margin: 0;padding: 0">
        <tr>
            @if($request->sample->first())
                @foreach($request->sample[0]->sample_attr as $title)
                    <td>{{$title->name}}</td>
                @endforeach
            @endif
        </tr>
        @if($request->sample->first())
            @foreach($request->sample as $sample)
                <tr>
                    @foreach($sample->sample_attr as $attr)
                        <td class="no_m_g">{{$attr->value}}</td>
                    @endforeach
                </tr>
            @endforeach
        @endif
    </table>
</td>
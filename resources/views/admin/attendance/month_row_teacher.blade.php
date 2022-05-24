
<div class="att-table">
    <table class="table table-striped table-hover">
<thead>
    <tr>
        <th class="text-center">Roll</th>
        <th style="padding-left: 10px">Name</th>
        @for($i = 1;$i<=cal_days_in_month(CAL_GREGORIAN, $month, $year);$i++)
            <th style="padding-left: 10px">{{ $i }}</th>
        @endfor
    </tr>
    </thead>
    <tbody id="atn_result_show">
    @foreach($teachers as $teacher)
        <tr>
            <th>{{ $teacher->card_id }}</th>
            <th>{{ $teacher->name }}</th>
            @for($i = 1;$i<=cal_days_in_month(CAL_GREGORIAN, $month, $year);$i++)
                @if($i < 10)
                    @php $i = '0'.$i @endphp
                @endif
                <th>
                    @php $attn = DB::table('attendances')->where('registration_id',$teacher->card_id)->where('access_date','like',$year.'-'.$month.'-'.$i.' %')->min('access_date') @endphp
                    @if($attn == null)
                        <span style="color:white; background: red; padding: 2px 3px; border-radius: 15%;">A</span>
                    @else
                        <span style="color:white; background: green; padding: 2px 3px; border-radius: 15%;">P</span>
                    @endif
                </th>
            @endfor
        </tr>
    @endforeach

    </tbody>
    </table>
</div>
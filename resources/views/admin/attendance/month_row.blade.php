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
    @foreach($students as $student)
{{--            {{dd($student)}}--}}
        <tr>
            <th>{{ $student->rank }}</th>
            <th>{{ $student->name }}</th>
            @for($i = 1;$i<=cal_days_in_month(CAL_GREGORIAN, $month, $year);$i++)
                @if($i < 10)
                    @php $i = '0'.$i @endphp
                @endif
                <td>
                    @php $attn = DB::table('attendances')->where('registration_id', $student->studentId)->where('access_date','like',$year.'-'.$month.'-'.$i.' %')->min('access_date') @endphp
                    @if($attn == null)
                        <span style="color:white; background: red" class="badge">A</span>
                    @else
                        <span style="color:white; background: green" class="badge">P</span>
                    @endif
                </td>
            @endfor
        </tr>
    @endforeach

    </tbody>
    </table>
</div>

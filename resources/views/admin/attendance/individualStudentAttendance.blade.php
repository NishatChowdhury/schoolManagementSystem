
@if($attendances->count()>0)
    @foreach($attendances as $key=>$info)
        <tr>
            <td>{{ $std->name }}</td>
            <td>{{ $std->studentId }}</td>
            <td>{{ $std->rank }}</td>
            <td> {{ \Carbon\Carbon::parse($info->first()->access_date)->format('Y-m-d') }} </td>
            <td> {{ $std->class_id }}</td>
            <td> </td>
            <td> </td>
            <td> {{ \Carbon\Carbon::parse($info->first()->access_date)->format('h:i:s A') }}</td>
            <td> {{ \Carbon\Carbon::parse($info->last()->access_date)->format('h:i:s A') }} </td>

            @if(\Carbon\Carbon::parse($info->first()->access_date)->format('h:i:s A') <= '09:00:00')
                    <td class="badge" style="color:white; background: green; padding: 5px 8px; ">{{'In Time'}}</td>
                @else(\Carbon\Carbon::parse($info->first()->access_date)->format('h:i:s A') >= '09:00:02')
                    <td class="badge" style="color:white; background: darkred; padding: 5px 8px; ">{{'Late'}}</td>

            @endif

            <td></td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="11"><h2 style="text-align:center; color: darkred">Attendance Not Found</h2></td>
    </tr>
@endif

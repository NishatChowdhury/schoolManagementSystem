
@if($attendances->count()>0)
    @foreach($attendances as $key=>$info)
        <tr>
            <td>{{ $teachers->name }}</td>
            <td>{{ $teachers->card }}</td>
            <td> {{ \Carbon\Carbon::parse($info->first()->access_date)->format('Y-m-d') }} </td>
            <td> {{ \Carbon\Carbon::parse($info->first()->access_date)->format('h:i:s A') }}</td>
            <td> {{ \Carbon\Carbon::parse($info->last()->access_date)->format('h:i:s A') }} </td>
            <td> </td>
            <td> </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="11"><h2 style="text-align:center; color: darkred">Attendance Not Found</h2></td>
    </tr>
@endif

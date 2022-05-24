@foreach($students as $student)

    @php
        $attendances =  \App\Attendance::query()
                        ->where('registration_id',$student->studentId)
                        ->whereBetween('access_date',[$start,$end])->get()
                        ->groupBy(function($date) {
                         return \Carbon\Carbon::parse($date->access_date)->format('Y-m-d');
                        });
    @endphp


        @if(count($attendances) > 0)
            @foreach($attendances as $attendance)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->studentId }}</td>
                            <td>{{ $student->rank }}</td>
                            <td> {{ \Carbon\Carbon::parse($attendance->first()->access_date)->format('d-M-Y') }} </td>
                            <td> {{ $student->class_id }}</td>
                            <td> </td>
                            <td> </td>
                            <td> {{ \Carbon\Carbon::parse($attendance->first()->access_date)->format('h:i:s A') }}</td>
                            <td> {{ \Carbon\Carbon::parse($attendance->last()->access_date)->format('h:i:s A') }} </td>
                            <td> </td>
                            <td> </td>
                        </tr>
            @endforeach
        @endif

@endforeach

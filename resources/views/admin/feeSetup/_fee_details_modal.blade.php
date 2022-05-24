@foreach($fee_pivot as $key => $fee)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $fee->category->name }}</td>
        <td>{{ $fee->amount }}</td>
    </tr>
@endforeach

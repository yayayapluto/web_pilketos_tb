@extends("layouts.admin.monitor")

@section('title', 'Monitor Voting')

@section('content')
    <h1>Voting Monitor</h1>
    
    <h2>Votes by Period</h2>
    <ul>
        @foreach($voteByPeriodLabel as $index => $label)
            <li>{{ $label }}: {{ $voteByPeriodData[$index] }}</li>
        @endforeach
    </ul>

    <h2>Transaction Data</h2>
    <table>
        <thead>
            <tr>
                <th>NISN</th>
                <th>Kandidat</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactionData as $transaction)
                <tr>
                    <td>{{ $transaction['nisn'] }}</td>
                    <td>{{ $transaction['candidate'] }}</td>
                    <td>{{ $transaction['time'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

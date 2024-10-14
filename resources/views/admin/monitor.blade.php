<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monitoring Dashboard</title>
</head>
<body>
    <x-alert />
    <h1>Monitoring Dashboard</h1>
    
    <h2>Vote Count by Period</h2>
    <ul>
        @foreach ($voteByPeriodLabel as $index => $label)
            <li>{{ $label }}: {{ $voteByPeriodData[$index] }}</li>
        @endforeach
    </ul>

    <h2>Transaction Data</h2>
    <table>
        <thead>
            <tr>
                <th>{{ $transactionLabel[0] }}</th>
                <th>{{ $transactionLabel[1] }}</th>
                <th>{{ $transactionLabel[2] }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactionData as $transaction)
                <tr>
                    <td>{{ $transaction['nisn'] }}</td>
                    <td>{{ $transaction['candidate'] }}</td>
                    <td>{{ $transaction['time'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

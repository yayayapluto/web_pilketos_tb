<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <x-alert />
    <h1>Dashboard</h1>
    <br>
    <h2>Grafik yang sudah vote dan belum</h2>
    <ul>
        <li>{{ $voteStatusLabel[0] }}: {{ $voteStatusData[0] }}</li>
        <li>{{ $voteStatusLabel[1] }}: {{ $voteStatusData[1] }}</li>
    </ul>
    <br>
    <h2>Grafik perbandingan antar kandidat</h2>
    <ul>
        @foreach ($candidateVoteLabel as $index => $label)
            <li>{{ $label }}: {{ $candidateVoteData[$index] }}</li>
        @endforeach
    </ul>
</body>
</html>

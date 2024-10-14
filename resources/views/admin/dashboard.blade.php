@extends('app.dashboard.main')

@section('pageTitle', "Dashboard")
@section('breadcrumbs')

<li>Dashboard</li>

@endsection

@section('content')

    <x-alert />
    
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


@endsection





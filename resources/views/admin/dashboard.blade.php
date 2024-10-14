@extends('layouts.admin.dashboard')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Dashboard</h1>
    
    <h2>Voting Status</h2>
    <ul>
        @foreach($voteStatusLabel as $index => $label)
            <li>{{ $label }}: {{ $voteStatusData[$index] }}</li>
        @endforeach
    </ul>

    <h2>Candidate Votes</h2>
    <ul>
        @foreach($candidateVoteLabel as $index => $label)
            <li>{{ $label }}: {{ $candidateVoteData[$index] }}</li>
        @endforeach
    </ul>
@endsection

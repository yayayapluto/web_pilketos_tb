@extends('layouts.landing')

@section('title', 'Welcome')

@section('header', 'Candidates List')

@section('content')
    <div>
        @foreach ($candidates as $candidate)
            <div style="margin-bottom: 20px;">
                <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}" style="width: 100px;">
                <h2>{{ $candidate->name }}</h2>
                <p>{{ $candidate->description }}</p>
                <p><a href="{{ $candidate->external_link }}" target="_blank">Link Eksternal</a></p>
                <a href="{{route("candidate", $candidate->candidate_id)}}">Cek Selengkapnya</a>
            </div>
        @endforeach
    </div>
@endsection

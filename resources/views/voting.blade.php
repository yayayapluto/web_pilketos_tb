@extends('layouts.voting')

@section('title', 'Welcome')

@section('header', 'Candidates List')

@section('content')
    <div>
        <form action="{{ route('voting.submit') }}" method="POST">
            @csrf
            <div>
                <label for="nisn">NISN:</label>
                <input type="text" id="nisn" name="nisn" required>
            </div>
            <div>
                <label for="candidate_id">Pilih Kandidat:</label>
                <select id="candidate_id" name="candidate_id" required>
                    <option value="">-- Pilih Kandidat --</option>
                    @foreach ($candidates as $candidate)
                        <option value="{{ $candidate->candidate_id }}">{{ $candidate->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Vote</button>
        </form>

        <hr>

        @foreach ($candidates as $candidate)
            <div style="margin-bottom: 20px;">
                <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}" style="width: 100px;">
                <h2>{{ $candidate->name }}</h2>
                <p>{{ $candidate->description }}</p>
                <p><a href="{{ $candidate->external_link }}" target="_blank">Link Eksternal</a></p>
                <a href="{{ route('candidate', $candidate->candidate_id) }}">Cek Selengkapnya</a>
            </div>
        @endforeach
    </div>
@endsection

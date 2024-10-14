@extends("layouts.candidate.show")

@section("title", "Candidate Details")

@section("header", "Candidate Details")

@section("content")
    <div>
        <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}">
        <h2>{{ $candidate->name }}</h2>
        <p>{{ $candidate->description }}</p>
        <p>External Link: <a href="{{ $candidate->external_link }}">{{ $candidate->external_link }}</a></p>
        
        <form action="{{ route('candidates.destroy', $candidate->candidate_id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
    <a href="{{ route('candidates.index') }}">Back to List</a>
@endsection

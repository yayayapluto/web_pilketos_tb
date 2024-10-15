@extends("layouts.candidate.show")

@section("title", "Candidate Details")

@section("header", "Candidate Details")

@section("content")
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Candidate Information</h3>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}" class="img-fluid" style="max-width: 200px;">
                </div>
                <h2 class="text-center">{{ $candidate->name }}</h2>
                <p>{{ $candidate->description }}</p>
                <p>External Link: <a href="{{ $candidate->external_link }}" target="_blank">{{ $candidate->external_link }}</a></p>
            </div>
            <div class="card-footer">
                <a href="{{ route('candidates.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection

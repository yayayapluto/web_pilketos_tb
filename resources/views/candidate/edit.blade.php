@extends("layouts.candidate.edit")

@section("title", "Edit Candidate")

@section("header", "Edit Candidate")

@section("content")
    <form action="{{ route('candidates.update', $candidate->candidate_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
        </div>

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $candidate->name }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required>{{ $candidate->description }}</textarea>
        </div>

        <div>
            <label for="external_link">External Link</label>
            <input type="url" name="external_link" id="external_link" value="{{ $candidate->external_link }}" required>
        </div>

        <button type="submit">Update Candidate</button>
    </form>
@endsection

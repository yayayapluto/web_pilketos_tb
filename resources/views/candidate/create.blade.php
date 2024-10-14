@extends("layouts.candidate.create")

@section("title", "New Candidate")

@section("header", "New Candidate Form")

@section("content")
    <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("POST")

        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image" required>
        </div>

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>
        </div>

        <div>
            <label for="external_link">External Link</label>
            <input type="url" name="external_link" id="external_link" required>
        </div>

        <button type="submit">Create Candidate</button>
    </form>
@endsection

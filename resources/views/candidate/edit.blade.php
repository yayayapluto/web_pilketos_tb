<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Candidate</title>
</head>

<body>
    <h1>Edit Candidate</h1>

    <x-alert />

    <form action="{{ route('candidates.update', $candidate->candidate_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*">
            <p>Current Image: <img src="{{ asset('storage/' . $candidate->image) }}" alt="Current Image" style="max-width: 200px;"></p>
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $candidate->name }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ $candidate->description }}</textarea>
        </div>
        <div>
            <label for="external_link">External Link:</label>
            <input type="url" id="external_link" name="external_link" value="{{ $candidate->external_link }}">
        </div>
        <div>
            <button type="submit">Update Candidate</button>
        </div>
    </form>
</body>

</html>

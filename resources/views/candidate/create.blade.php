<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Candidate</title>
</head>

<body>
    <h1>Create Candidate</h1>

    <x-alert />

    <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="external_link">External Link:</label>
            <input type="url" id="external_link" name="external_link" required>
        </div>
        <div>
            <button type="submit">Create Candidate</button>
        </div>
    </form>
</body>

</html>

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

    <form action="{{ route('candidates.create') }}" method="POST">
        @csrf
        <div>
            <label for="image">Image:</label>
            <input type="text" id="image" name="image" required>
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
            <input type="url" id="external_link" name="external_link">
        </div>
        <div>
            <button type="submit">Create Candidate</button>
        </div>
    </form>
</body>

</html>

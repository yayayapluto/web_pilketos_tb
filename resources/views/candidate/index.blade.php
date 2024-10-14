@extends("layouts.candidate.index")

@section("title", "Candidates List")

@section("header", "Candidates")

@section("content")
    <a href="{{ route('candidates.create') }}">Add New Candidate</a>
    
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>External Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($candidates as $candidate)
                <tr>
                    <td><img src="{{ asset("storage/" . $candidate->image) }}" alt="{{ $candidate->name }}" width="50"></td>
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->description }}</td>
                    <td><a href="{{ $candidate->external_link }}">{{ $candidate->external_link }}</a></td>
                    <td>
                        <a href="{{ route('candidates.show', $candidate->candidate_id) }}">View</a>
                        <a href="{{ route('candidates.edit', $candidate->candidate_id) }}">Edit</a>
                        <form action="{{ route('candidates.destroy', $candidate->candidate_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

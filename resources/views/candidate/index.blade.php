@extends('layouts.private')

@section('content')
    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid mt-4">
                <!-- Candidates List -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Candidates List</h3>
                        <div class="card-tools d-flex justify-content-end">
                            <a href="{{ route('candidates.create') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus"></i> Add New Candidate
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
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
                                    @foreach ($candidates as $candidate)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/' . $candidate->image) }}"
                                                    alt="{{ $candidate->name }}" width="50" class="img-thumbnail">
                                            </td>
                                            <td>{{ $candidate->name }}</td>
                                            <td>{{ $candidate->description }}</td>
                                            <td><a href="{{ $candidate->external_link }}"
                                                    target="_blank">{{ $candidate->external_link }}</a></td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <a href="{{ route('candidates.show', $candidate->candidate_id) }}"
                                                        class="btn btn-info btn-sm mb-1">View</a>
                                                    <a href="{{ route('candidates.edit', $candidate->candidate_id) }}"
                                                        class="btn btn-warning btn-sm mb-1">Edit</a>
                                                    <form
                                                        action="{{ route('candidates.destroy', $candidate->candidate_id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this candidate?');">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

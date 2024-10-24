@extends("layouts.private")

@section("title", "Edit Candidate")

@section("content")
    <main class="app-main">
        <div class="app-content">
<div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Candidate</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('candidates.update', $candidate->candidate_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $candidate->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea name="description" id="description" class="form-control" required>{{ $candidate->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="external_link" class="form-label">Link eksternal</label>
                        <input type="url" name="external_link" id="external_link" class="form-control" value="{{ $candidate->external_link }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Perbarui</button>
                    <a href="{{ route('candidates.index') }}" class="btn btn-secondary">Tidak jadi</a>
                </form>
            </div>
        </div>
    </div>
        </div>
    </main>
@endsection

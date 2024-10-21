@extends('layouts.candidate.create')

@section("header")
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah kandidat baru</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" formnovalidate></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="external_link" class="form-label">External Link</label>
                                <input type="url" name="external_link" id="external_link" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Candidate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
    ClassicEditor
    .create( document.querySelector( '#description' ) )
    .catch( error => {
    console.error( error );
    });
</script>
@endsection

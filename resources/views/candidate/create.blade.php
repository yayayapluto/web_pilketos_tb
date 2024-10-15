@extends("layouts.candidate.create")

@section("content")
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create New Candidate</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("POST")

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
                                <textarea name="description" id="description" class="form-control" required></textarea>
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

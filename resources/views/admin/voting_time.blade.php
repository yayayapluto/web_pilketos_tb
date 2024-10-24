@extends('layouts.private')

@section('content')
<main class="app-main">
    <div class="app-content">
        <div class="container-fluid mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Perbarui waktu voting</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('votingTime.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="start" class="form-label">Tanggal dan waktu mulai</label>
                            <input type="datetime-local" name="start" id="start" class="form-control" value="{{ $data['start'] }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="end" class="form-label">Tanggal dan waktu berakhir</label>
                            <input type="datetime-local" name="end" id="end" class="form-control" value="{{ $data['end'] }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

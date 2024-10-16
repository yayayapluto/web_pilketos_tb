@extends('layouts.voting')

@section('title', 'Welcome')

@section('header')

@section('content')
    <div class="container-fluid position-relative background-wave" style="background-color: #007bff; padding-bottom: 100px; z-index:-10;">
    </div>
    <div class="container">
        <form action="{{ route('voting.submit') }}" method="POST">
            @csrf
            <div class="d-flex flex-row">
                <label for="nisn">NISN anda:</label>
                <input type="text" id="nisn" name="nisn" required>
            </div>
            <div>
                <label for="candidate_id">Pilih Kandidat:</label>

                <select id="candidate_id" name="candidate_id" required>
                    <option value="">-- Pilih Kandidat --</option>
                    @foreach ($candidates as $candidate)
                        <option value="{{ $candidate->candidate_id }}">{{ $candidate->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Vote</button>
        </form>

        <hr>

        <div class="text-center">

            <h1>Kandidat</h1>
            <h5>Pilih salah satu kandidat</h5>
        </div>
        @foreach ($candidates as $candidate)
            <div class="col-md-4">
                <div class="card text-center">
                    <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}"
                        class="fixed-img card-img-top" alt="...">
                    <div class="card-body">
                        <h2 class="card-title mb-5">{{ $candidate->name }}</h2>
                    </div>

                    <div class="card-footer d-flex justify-content-between align-items-center">

                        <a class="btn btn-dark" href="{{ route('candidate', $candidate->candidate_id) }}" role="button">
                            <i class="bi bi-info-circle"></i> Info
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('footer')
    <x-client_footer></x-client_footer>
@endsection

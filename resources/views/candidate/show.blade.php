@extends('layouts.private')

@section('content')
    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail Kandidat</h3>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}" class="img-fluid" style="max-width: 200px;">
                        <h2>{{ $candidate->name }}</h2>
                        <span>{!! $candidate->description !!}</span>
                        <p>Link Eksternal: <a href="{{ $candidate->external_link }}" target="_blank">{{ $candidate->external_link }}</a></p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('candidates.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

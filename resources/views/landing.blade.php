@extends('layouts.landing')

@section('title', 'Welcome')

@section('header')
    <x-head></x-head>
    <x-navbar></x-navbar>
@endsection

@section('content')
    <div class="main-hero">
        <div class="container-fluid text-center">
            <div class="top-side">
                <img src="assets/logoTB/mpk-white-bg.png" alt="" width="70" height="70">
                <h2>"Suaramu, Aksimu! Jadilah Bagian dari Perubahan, Pilih Ketua OSIS Masa Depan!"</h2>
                <img src="assets/logoTB/IMG_4425.PNG" alt="" width="70" height="70">
            </div>
            <button type="button" class="btn btn-light">Pilih</button>
        </div>
    </div>

    <div>
        @foreach ($candidates as $candidate)
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h2 class="card-title">{{ $candidate->name }}</h2>
                            <p class="card-text">{{ $candidate->description }}</p>
                        </div>

                        <a class="btn btn-primary" href="{{ route('candidate', $candidate->candidate_id) }}" role="button">
                            <i class="bi bi-info-circle"></i> Info</a>
                        <p><a href="{{ $candidate->external_link }}" target="_blank">Link Eksternal</a></p>
                    </div>
                </div>
            </div>
        @endforeach
        <a class="btn btn-primary" href="#" role="button">Info</a>
    </div>
@endsection

@section('footer')
    <x-footer></x-footer>
@endsection

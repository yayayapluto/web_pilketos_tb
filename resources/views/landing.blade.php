@extends('layouts.landing')

@section('title', 'Welcome')

@section('header')
    <x-head></x-head>
    <x-navbar></x-navbar>
@endsection

@section('content')
    <div class="main-hero">
        <div class="container-fluid text-center text-white" style="margin-top: 200px">
            <div class="top-side">
                <img src="assets/logoTB/mpk-white-bg.png" alt="" width="150" height="150">
                <h2 class="text-wrap font-weight-bold" style="width: 40rem">"Suaramu, Aksimu! Jadilah Bagian dari Perubahan,
                    Pilih Ketua OSIS
                    Masa Depan!"</h2>
                <img src="assets/logoTB/IMG_4425.PNG" alt="" width="150" height="150">
            </div>
            <button type="button" class="btn btn-light">Pilih</button>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0099ff" fill-opacity="1"
            d="M0,192L48,181.3C96,171,192,149,288,144C384,139,480,149,576,176C672,203,768,245,864,272C960,299,1056,309,1152,298.7C1248,288,1344,256,1392,240L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
        </path>
    </svg>

    <div>
        <h1 class="text-center">Kandidat</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($candidates as $candidate)
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h2 class="card-title">{{ $candidate->name }}</h2>
                            {{-- <p class="card-text">{{ $candidate->description }}</p> --}}
                        </div>
                        <a class="btn btn-dark" href="{{ route('candidate', $candidate->candidate_id) }}" role="button">
                            <i class="bi bi-info-circle"></i> Info</a>
                        <p><a href="{{ $candidate->external_link }}" target="_blank">Link Eksternal</a></p>
                        <p></p>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="btn btn-primary" href="#" role="button">Pilih</a>
    </div>
@endsection

@section('footer')
    <x-footer></x-footer>
@endsection

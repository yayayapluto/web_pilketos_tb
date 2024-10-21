@extends('layouts.landing')

@section('title', 'Welcome')

@section('header')
    <x-head />
    <x-client_navbar></x-client_navbar>


    <style>
        .containerkanidat {
            box-shadow: 0px 0px 0px 0px #0083D4;
            -webkit-box-shadow: 0px 0px 0px 0px #0083D4;
            -moz-box-shadow: 0px 0px 0px 0px #0083D4;
            transition: box-shadow 0.3s ease-in-out;
        }

        .containerkanidat:hover {
            box-shadow: -12px 13px 0px 0px #0083D4;
            -webkit-box-shadow: -12px 13px 0px 0px #0083D4;
            -moz-box-shadow: -12px 13px 0px 0px #0083D4;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="main-hero headerwraping">
        <div class="container-fluid text-center text-white" id="headercontainer">
            <div class="top-side">
                <img id="imgmpk" src="assets/logoTB/mpk-white-bg.png" alt="" width="200" height="200">


                <a id="headertext">"Suaramu, Aksimu! Jadilah Bagian dari
                    Perubahan,
                    Pilih Ketua OSIS
                    Masa Depan!"</a>


                <img id="imgosis" src="assets/logoTB/IMG_4425.PNG" alt="" width="180" height="180">
            </div>
            <a href="{{ route('voting') }}">
                <button style="margin-top: 20px" type="button" class="headerbutton">
                    Pilih
                </button>
            </a>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0099ff" fill-opacity="1"
            d="M0,192L48,181.3C96,171,192,149,288,144C384,139,480,149,576,176C672,203,768,245,864,272C960,299,1056,309,1152,298.7C1248,288,1344,256,1392,240L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
        </path>
    </svg>

    <div class="container mt-5">
        <h1 class="text-center text-dark">Kandidat</h1>
        <div class="row justify-content-center">
            @foreach ($candidates as $candidate)
                <div class="col-md-4" style="height: 600px">
                    <div class="card text-center containerkanidat" style="height: 560px;">
                        <img style="height: 285px; width:75%;object-fit:cover; margin-top:15px;border-radius:15px;margin-left:50px"
                            src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}"
                            class="fixed-img card-img-top" alt="...">
                        <div class="card-body">
                            <h2 class="card-title mb-5">{{ $candidate->name }}</h2>
                        </div>

                        <div class="card-footer d-flex">
                            <a class="btn btn-dark" href="{{ route('candidate', $candidate->candidate_id) }}"
                                role="button">
                                <i class="bi bi-info-circle"></i> Info
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center m-5">
            <a class="btn btn-primary" href="{{ route('voting') }}" role="button">Pilih</a>
        </div>
    </div>
@endsection

@section('footer')
    <x-client_footer></x-client_footer>
@endsection

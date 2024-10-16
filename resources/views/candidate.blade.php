@extends('layouts.candidate')

@section('title', 'Candidates List')

@section('header')
    <x-client_navbar></x-client_navbar>
@endsection

@section('content')
    <style>
        svg:hover {
            fill: rgb(222, 222, 222);
        }
    </style>

    <div class="container-fluid"
        style="background-image: url('../../assets/logoTB/Screenshot 2024-10-16 135500.png'); padding-bottom: 50px; background-repeat: no-repeat;
background-size: contain;">
        <div class="container">
            <div class="back-button">
                <div style="padding-top:50px;">
                    <a href="{{ route('voting') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white"
                            class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="row bg-white shadow-lg rounded p-4" style="max-width: 1100px;">
                <div class="col-md-5 text-center">
                    <img style="height:300px;width:300px;object-fit:cover;"
                        src="{{ asset('storage/' . $candidate->image) }}" class="rounded img-fluid mb-3"
                        alt="Profile Image">
                    <p><strong>NISN:</strong> 17813719</p>
                </div>

                <div class="col-md-7">
                    <h3 class="text-primary"><strong>{{ $candidate->name }}</strong></h3>
                    <p style="font-size: 24px">{{ $candidate->description }}</p>

                    <p class="text-muted">Sosial Kandidat</p>
                    <a href="{{ $candidate->external_link }}"><i class="bi bi-instagram" style="font-size: 24px;"></i></a>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('footer')
    <x-client_footer></x-client_footer>
@endsection

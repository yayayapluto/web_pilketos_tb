@extends('layouts.candidate')

@section('title', 'Candidates List')

@section('header')
    <x-client_navbar></x-client_navbar>
@endsection

@section('content')
    <div class="container-fluid" style="background-color: #007bff; padding-bottom: 50px; position: relative;">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-1">
                    <button type="button" class="btn-close mt-3" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="row bg-white shadow-lg rounded p-4" style="max-width: 1100px;">
                <div class="col-md-5 text-center">
                    <img src="{{ asset('storage/' . $candidate->image) }}" class="rounded img-fluid mb-3"
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

        <div class="wave" style="position: absolute; bottom: 0; left: 0; width: 100%; overflow: hidden; line-height: 0;">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100px; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.70,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #fff;"></path>
            </svg>
        </div>
    </div>
@endsection

@section('footer')
    <x-client_footer></x-client_footer>
@endsection

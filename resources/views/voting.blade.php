@extends('layouts.voting')

@section('title', 'Welcome')

@section('header')

@section('content')
   
    <div style="position: relative">
        <div style="display:flex; justify-content:center; align-items:center">
         <div style="position: absolute; top:0;margin-top:50px">

            <a style="font-size: 30px;">Kandidat</a><br>
            <a>Pilih salah satu kandidat</a>
        </div>    
        </div>
       
        <img style="width: 100%" src={{asset("assets/waves.png")}} alt="">
    </div>
    <div class="top:0px">
        <div id="containervoting1" class="container mt-5">

            <div class="row justify-content-center">
                @foreach ($candidates as $candidate)
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-img-container">
    
                                <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}"
                                    class="card-img-top" alt="...">
                            </div>
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
        </div>
    
        <div class="container">
    
            <form action="{{ route('voting.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="nisn">NISN anda:</label>
                    <input class="form-control" type="text" id="nisn" name="nisn" required>
                </div>
                <div>
                    <label class="form-label" for="candidate_id">Pilih Kandidat:</label>
    
                    <select class="form-select" id="candidate_id" name="candidate_id" required>
                        <option value="">-- Pilih Kandidat --</option>
                        @foreach ($candidates as $candidate)
                            <option value="{{ $candidate->candidate_id }}">{{ $candidate->name }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="text-center my-5">
    
                    <button class="btn btn-primary" type="submit">Vote</button>
                </div>
            </form>
        </div>
    
    </div>
    
@endsection

@section('footer')
    <x-client_footer></x-client_footer>
@endsection

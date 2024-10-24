@extends('layouts.landing')

@section('title','Welcome')

@section('header')
<x-countdownnav></x-countdownnav>
@endsection

@section('content')

<div style="background: #0099FF; height: 100vh; display: flex; align-items: center; justify-content: center; color: white;">
    <div style="text-align: center;">
        <h1 style="font-size: 2.5rem; margin-bottom: 20px;">Pemilihan Sudah Berakhir</h1>  
        @if(session("datetime"))
            <p style="font-size: 1.5rem;">Berakhir pada <b>{{ session("datetime") }}</b></p>
        @endif
        <a href="{{ route('landing') }}" style="text-decoration: none;">
            <button style="padding: 10px 20px; font-size: 1rem; background-color: white; color: #0099FF; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
                Balik ke Beranda
            </button>
        </a>
    </div>
</div>

@endsection

@section('footer')
<x-client_footer></x-client_footer>
@endsection

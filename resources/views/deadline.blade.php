@extends('layouts.landing');

@section('title','welcome');

@section('header')
<x-countdownnav></x-countdownnav>
@endsection

@section('content')

<div style="background: #0099FF; height:90%; width:100%;">
    <div style="display: flex; align-content:center; justify-content:center; margin-top:300px;color:white; text-align:center;">
        <h1>Terimakasih Sudah Memilih😁</h1>    
    </div>
    
</div>

@endsection

@section('footer')
<x-client_footer></x-client_footer>
@endsection
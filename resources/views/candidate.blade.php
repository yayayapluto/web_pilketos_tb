@extends('layouts.candidate')

@section('title', 'Candidates List')

@section('header', 'Candidates')

@section('content')
    <img src="{{ asset('storage/' . $candidate->image) }}" alt="{{ $candidate->name }}" width="50">
    <p>{{ $candidate->name }}</p>
    <p>{{ $candidate->description }}</p>
    <a href="{{ $candidate->external_link }}">{{ $candidate->external_link }}</a>
@endsection

@extends('layouts.main')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <p>{{ $konten }}</p>
    <p>Selamat datang di FitLife!</p>
@endsection

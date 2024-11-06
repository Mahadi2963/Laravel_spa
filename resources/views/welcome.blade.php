@extends('layouts.before')


@section('content')


<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center bg-dark text-white">
    <div class="container text-center">
        <h1>Analyze and Improve Student Performance</h1>
        <p>Leverage cutting-edge AI to track, predict, and enhance student achievements.</p>
        <a href="#features" class="btn btn-secondary">Learn More</a>
    </div>
</section>

<!-- Main Content Section -->
<section id="content" class="py-5">
    <div class="container">
        <h2 class="text-center">Welcome to Student Performance Analyzer</h2>
        <p class="text-center">Our platform uses advanced analytics to help students achieve their full potential.
        </p>
        <img src="{{ asset('images/logo.png') }}" class="img-fluid mx-auto d-block" alt="Student Performance">
    </div>
</section>
<br>

@endsection
@extends('layouts.teacher')

@section('content')

<div class="container-section py-5">
    <h1 class="text-center mb-4 bg-dark text-white">Welcome to Your Dashboard, {{ auth()->user()->name }}!</h1>

    <!-- Summary Cards -->
    <div class="row mb-5 justify-content-center">
        <div class="col-md-5 mb-4">
            <div class="card shadow border-0 rounded-3 overflow-hidden">
                <div class="card-body text-center">
                    <h4 class="card-title fw-bold">Assigned Subjects</h4>
                    <p class="card-text display-4 text-primary">{{ $subjectsCount }}</p>
                    <p class="text-muted">Subjects you are currently teaching.</p>
                </div>
            </div>
        </div>
        <div class="col-md-5 mb-4">
            <div class="card shadow border-0 rounded-3 overflow-hidden">
                <div class="card-body text-center">
                    <h4 class="card-title fw-bold">Students Managed</h4>
                    <p class="card-text display-4 text-success">{{ $studentsCount }}</p>
                    <p class="text-muted">Students under your guidance.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional Footer -->
    <div class="text-center">
        <p class="text-muted">Keep up the great work!</p>
    </div>
</div>

@endsection
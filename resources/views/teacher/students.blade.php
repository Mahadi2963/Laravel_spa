@extends('layouts.teacher')

@section('content')

<div class="container-section">

    <div class="container">
        <h1>Students in {{ $subject->name }}</h1>
        <table class="table table-bordered table-striped">
            <thead class="bg-dark text-white">
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->user->user_id }}</td>
                    <td>{{ $student->user->name }}</td>
                    <td>{{ $student->user->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>


@endsection
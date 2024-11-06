@extends('layouts.teacher')

@section('content')


<div class="container-section">


    <div class="container">
        <h1>Students in {{ $subject->name }}</h1>
        <table class="table table-bordered">
            <thead class="bg-dark text-white">
                <tr>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->user->name }}</td>
                    <td>{{ $student->user->email }}</td>
                    <td><a href="{{ route('teacher.evaluation.student.marks', [$subject->id, $student->id]) }}"
                            class="btn btn-primary">View Marks</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
@extends('layouts.teacher')

@section('content')


<div class="container-section">
    <div class="container">
        <h1>Your Subjects</h1>
        <table class="table table-bordered table-striped">
            <thead class="bg-dark text-white">
                <tr>
                    <th>Subject Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td><a href="{{ route('teacher.subjects.students', $subject->id) }}" class="btn btn-primary">View
                            Students</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
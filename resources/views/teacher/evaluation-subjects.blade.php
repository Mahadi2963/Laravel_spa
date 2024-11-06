@extends('layouts.teacher')

@section('content')


<div class="container-section">


    <div class="container">
        <h1>Your Subjects for Evaluation</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="bg-dark text-white">
                    <th>Subject Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td><a href="{{ route('teacher.evaluation.students', $subject->id) }}"
                            class="btn btn-primary">Evaluate
                            This Subject</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@endsection
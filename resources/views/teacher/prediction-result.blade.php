@extends('layouts.teacher')

@section('content')
<div class="container-section">
    <div class="container">
        <h1>Prediction Results</h1>

        <div class="card mt-3">
            <div class="card-header">
                <h5>Student Name: {{ $student->name }}</h5>
                <h6>Student ID: {{ $student->id }}</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Predicted Marks</th>
                        <td>{{ $mark->predicted_marks }}</td>
                    </tr>
                    <tr>
                        <th>Recommendations</th>
                        <td>{{ $mark->recommendations }}</td>
                    </tr>
                </table>
                <a href="{{ route('teacher.student.marks', $student->id) }}" class="btn btn-primary mt-3">Back to
                    Marks</a>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.student')

@section('content')


<div class="container-section">

    <div class="container">
        <h1>Your Marks</h1>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject ID</th>
                    <th>Subject Name</th>
                    <th>Predicted Marks</th>
                    <th>Final Grade</th>
                    <th>Present Count</th>
                    <th>Absent Count</th>
                    <th>Class Test 1</th>
                    <th>Lab Test 1</th>
                    <th>Mid Mark</th>
                    <th>Class Test 2</th>
                    <th>Lab Test 2</th>
                    <th>Assignment</th>
                    <th>External Activity</th>
                    <th>Recommendations</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marks as $mark)
                <tr>
                    <td>{{ $mark->subject_id }}</td>
                    <td>{{ $mark->subject->name }}</td>
                    <td>{{ $mark->predicted_marks }}</td>
                    <td>{{ $mark->final_grade }}</td>
                    <td>{{ $mark->present_count }}</td>
                    <td>{{ $mark->absent_count }}</td>
                    <td>{{ $mark->classTest_1 }}</td>
                    <td>{{ $mark->Lab_Test1 }}</td>
                    <td>{{ $mark->mid_mark }}</td>
                    <td>{{ $mark->classTest_2 }}</td>
                    <td>{{ $mark->Lab_Test2 }}</td>
                    <td>{{ $mark->assignment }}</td>
                    <td>{{ $mark->external_activity }}</td>
                    <td>{{ $mark->recommendations }}</td>
                    <td>
                        <form action="{{ route('student.predict.mark') }}" method="POST">
                            @csrf
                            <input type="hidden" name="mark_id" value="{{ $mark->id }}">
                            <button type="submit" class="btn btn-success">Predict Mark</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@endsection
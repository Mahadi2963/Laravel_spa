@extends('layouts.teacher')

@section('content')

<div class="container-section">
    <div class="container">
        <h1>Marks for Student in Subject</h1>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @foreach($marks as $mark)
        <div class="card mb-3">
            <div class="card-header bg-dark text-white">
                <h5>Student ID: {{ $mark->student_id }} | Subject ID: {{
                    $mark->subject_id }}</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Predicted Marks</th>
                            <td>{{ $mark->predicted_marks }}</td>
                        </tr>
                        <tr>
                            <th>Final Grade</th>
                            <td>{{ $mark->final_grade }}</td>
                        </tr>
                        <tr>
                            <th>Present Count</th>
                            <td>{{ $mark->present_count }}</td>
                        </tr>
                        <tr>
                            <th>Absent Count</th>
                            <td>{{ $mark->absent_count }}</td>
                        </tr>
                        <tr>
                            <th>Class Test 1</th>
                            <td>{{ $mark->classTest_1 }}</td>
                        </tr>
                        <tr>
                            <th>Lab Test 1</th>
                            <td>{{ $mark->Lab_Test1 }}</td>
                        </tr>
                        <tr>
                            <th>Mid Mark</th>
                            <td>{{ $mark->mid_mark }}</td>
                        </tr>
                        <tr>
                            <th>Class Test 2</th>
                            <td>{{ $mark->classTest_2 }}</td>
                        </tr>
                        <tr>
                            <th>Lab Test 2</th>
                            <td>{{ $mark->Lab_Test2 }}</td>
                        </tr>
                        <tr>
                            <th>Assignment</th>
                            <td>{{ $mark->assignment }}</td>
                        </tr>
                        <tr>
                            <th>External Activity</th>
                            <td>{{ $mark->external_activity }}</td>
                        </tr>
                        <tr>
                            <th>Recommendations</th>
                            <td>{{ $mark->recommendations }}</td>
                        </tr>
                    </tbody>
                </table>

                <!-- Action buttons -->
                <div class="mt-3">
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                        data-target="#updateMarkModal-{{ $mark->id }}">Update Mark</button>



                    <form action="{{ route('teacher.evaluation.predict.mark') }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="mark_id" value="{{ $mark->id }}">
                        <input type="hidden" name="subject_id" value="{{ $subjectId }}">
                        <input type="hidden" name="student_id" value="{{ $studentId }}">
                        <button type="submit" class="btn btn-success">Predict Mark</button>
                    </form>


                    {{-- <div class="mt-3">
                        <form action="{{ route('teacher.evaluation.predict.mark') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="mark_id" value="{{ $mark->id }}">
                            <button type="submit" class="btn btn-success">Predict Mark</button>
                        </form>
                    </div> --}}


                </div>
            </div>
        </div>

        <!-- Update Mark Modal -->
        <div class="modal fade" id="updateMarkModal-{{ $mark->id }}" tabindex="-1" role="dialog"
            aria-labelledby="updateMarkModalLabel-{{ $mark->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateMarkModalLabel-{{ $mark->id }}">Update Marks for Student ID:
                            {{ $mark->student_id }} | Subject ID: {{ $mark->subject_id }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('teacher.evaluation.update.mark') }}" method="POST">
                            @csrf
                            <input type="hidden" name="mark_id" value="{{ $mark->id }}">

                            <!-- Form fields for each mark component -->
                            <div class="form-group">
                                <label for="predicted_marks">Predicted Marks</label>
                                <input type="number" class="form-control" name="marks[predicted_marks]"
                                    value="{{ $mark->predicted_marks }}">
                            </div>
                            <div class="form-group">
                                <label for="final_grade">Final Grade</label>
                                <input type="text" class="form-control" name="marks[final_grade]"
                                    value="{{ $mark->final_grade }}">
                            </div>
                            <div class="form-group">
                                <label for="present_count">Present Count</label>
                                <input type="number" class="form-control" name="marks[present_count]"
                                    value="{{ $mark->present_count }}">
                            </div>
                            <div class="form-group">
                                <label for="absent_count">Absent Count</label>
                                <input type="number" class="form-control" name="marks[absent_count]"
                                    value="{{ $mark->absent_count }}">
                            </div>
                            <div class="form-group">
                                <label for="classTest_1">Class Test 1</label>
                                <input type="number" class="form-control" name="marks[classTest_1]"
                                    value="{{ $mark->classTest_1 }}">
                            </div>
                            <div class="form-group">
                                <label for="Lab_Test1">Lab Test 1</label>
                                <input type="number" class="form-control" name="marks[Lab_Test1]"
                                    value="{{ $mark->Lab_Test1 }}">
                            </div>
                            <div class="form-group">
                                <label for="mid_mark">Mid Mark</label>
                                <input type="number" class="form-control" name="marks[mid_mark]"
                                    value="{{ $mark->mid_mark }}">
                            </div>
                            <div class="form-group">
                                <label for="classTest_2">Class Test 2</label>
                                <input type="number" class="form-control" name="marks[classTest_2]"
                                    value="{{ $mark->classTest_2 }}">
                            </div>
                            <div class="form-group">
                                <label for="Lab_Test2">Lab Test 2</label>
                                <input type="number" class="form-control" name="marks[Lab_Test2]"
                                    value="{{ $mark->Lab_Test2 }}">
                            </div>
                            <div class="form-group">
                                <label for="assignment">Assignment</label>
                                <input type="number" class="form-control" name="marks[assignment]"
                                    value="{{ $mark->assignment }}">
                            </div>
                            <div class="form-group">
                                <label for="external_activity">External Activity</label>
                                <input type="number" class="form-control" name="marks[external_activity]"
                                    value="{{ $mark->external_activity }}">
                            </div>
                            <div class="form-group">
                                <label for="recommendations">Recommendations</label>
                                <textarea class="form-control" name="marks[recommendations]"
                                    rows="3">{{ $mark->recommendations }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>

@endsection
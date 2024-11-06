<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Marks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Force the table to fit within the screen width */
        .table-container {
            overflow-x: auto;
            white-space: nowrap;
        }

        .table th,
        .table td {
            padding: 0.5rem;
            font-size: 0.875rem;
            /* Make text slightly smaller */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Student Marks</h1>
        <h6 class="mb-4 text-center"> <b> For manual prediction use : </b> python
            C:/Users/mdmeh/OneDrive/Desktop/Laravel_spa/script.py student_id subject_id</h6>
        <div class="table-container">
            <table class="table table-bordered table-striped table-sm text-center">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Student ID</th>
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
                    @foreach ($marks as $mark)
                    <tr id="mark-{{ $mark->student_id }}-{{ $mark->subject_id }}">
                        <td>{{ $mark->student_id }}</td>
                        <td>{{ $mark->subject_id }}</td>
                        <td>{{ $mark->subject_name }}</td>
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
                            <button class="btn btn-primary btn-sm predict-btn" data-student-id="{{ $mark->student_id }}"
                                data-subject-id="{{ $mark->subject_id }}">Predict Marks</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.predict-btn').click(function () {
                var studentId = $(this).data('student-id');
                var subjectId = $(this).data('subject-id');

                console.log('Predict button clicked', { studentId, subjectId });

                $.ajax({
                    url: '{{ route('marks.predict') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        student_id: studentId,
                        subject_id: subjectId
                    },
                    success: function (response) {
                        console.log('AJAX success response', response);
                        alert(response.message);
                        // Update the table row with new predicted marks and recommendations
                        var row = $('#mark-' + studentId + '-' + subjectId);
                        row.find('td:eq(3)').text(response.mark.predicted_marks);
                        row.find('td:eq(4)').text(response.mark.final_grade);
                        row.find('td:eq(5)').text(response.mark.present_count);
                        row.find('td:eq(6)').text(response.mark.absent_count);
                        row.find('td:eq(7)').text(response.mark.classTest_1);
                        row.find('td:eq(8)').text(response.mark.Lab_Test1);
                        row.find('td:eq(9)').text(response.mark.mid_mark);
                        row.find('td:eq(10)').text(response.mark.classTest_2);
                        row.find('td:eq(11)').text(response.mark.Lab_Test2);
                        row.find('td:eq(12)').text(response.mark.assignment);
                        row.find('td:eq(13)').text(response.mark.external_activity);
                        row.find('td:eq(14)').text(response.mark.recommendations);
                    },
                    error: function (response) {
                        console.log('AJAX error response', response);
                        alert(response.responseJSON.message);
                    }
                });
            });
        });
    </script>
</body>

</html>
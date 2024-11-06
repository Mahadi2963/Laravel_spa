<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Mark;
use Symfony\Component\Process\Process;

class TeacherController extends Controller
{

    //For Dashboard
    public function dashboard()
    {
        // Retrieve the authenticated teacher
        $teacher = Auth::user()->teacher;

        // Count the subjects assigned to the teacher
        $subjectsCount = $teacher->subjects()->count();

        // Count the students managed by the teacher
        $studentsCount = Student::whereHas('subjects', function ($query) use ($teacher) {
            $query->whereIn('subject_id', $teacher->subjects->pluck('id'));
        })->count();

        // Pass the data to the view
        return view('teacher.dashboard', compact('subjectsCount', 'studentsCount'));
    }



    //For Subjects
    public function showSubjects()
    {
        // Retrieve the logged-in teacher's subjects
        $teacher = Auth::user()->teacher; // assuming `auth()->user()` returns the logged-in user
        $subjects = $teacher->subjects; // assuming the Teacher model has a subjects relationship

        return view('teacher.subjects', compact('subjects'));
    }




    public function showStudents($subjectId)
    {
        $teacher = Auth::user()->teacher;

        // Verify the subject is assigned to the teacher
        $subject = $teacher->subjects()->where('subjects.id', $subjectId)->firstOrFail();

        // Retrieve students associated with the subject
        $students = Student::whereHas('subjects', function ($query) use ($subject, $teacher) {
            $query->where('subjects.id', $subject->id)->whereHas('teachers', function ($query) use ($teacher) {
                $query->where('teachers.id', $teacher->id);
            });
        })->get();

        return view('teacher.students', compact('subject', 'students'));
    }



    //For Evaluation 

    public function showEvaluationSubjects()
    {
        $teacher = Auth::user()->teacher;
        $subjects = $teacher->subjects;

        return view('teacher.evaluation-subjects', compact('subjects'));
    }

    public function showEvaluationStudents($subjectId)
    {
        $teacher = Auth::user()->teacher;
        $subject = $teacher->subjects()->where('subjects.id', $subjectId)->firstOrFail();
        $students = Student::whereHas('subjects', function ($query) use ($subject, $teacher) {
            $query->where('subjects.id', $subject->id)->whereHas('teachers', function ($query) use ($teacher) {
                $query->where('teachers.id', $teacher->id);
            });
        })->get();

        return view('teacher.evaluation-students', compact('subject', 'students'));
    }

    public function showStudentMarks($subjectId, $studentId)
    {
        $teacher = Auth::user()->teacher;

        // Ensure the subject is assigned to the teacher
        $subject = $teacher->subjects()->where('subjects.id', $subjectId)->firstOrFail();

        // Retrieve the student within this subject under this teacher
        $student = $subject->students()->where('students.id', $studentId)->firstOrFail();

        // Retrieve marks for this student in this subject by this teacher
        $marks = Mark::where('student_id', $studentId)
            ->where('subject_id', $subjectId)
            ->where('teacher_id', $teacher->id)
            ->get();

        return view('teacher.student-marks', compact('marks', 'subjectId', 'studentId'));
    }









    public function updateMark(Request $request)
    {
        $request->validate([
            'mark_id' => 'required|integer',
            'marks' => 'required|array'
        ]);

        $mark = Mark::find($request->input('mark_id'));
        $mark->update($request->input('marks'));

        return redirect()->route('teacher.evaluation.student.marks', [$mark->subject_id, $mark->student_id])
            ->with('success', 'Marks updated successfully!');
    }





    // public function predictMark(Request $request)
    // {
    //     $mark = Mark::find($request->input('mark_id'));

    //     // Command to run the Python script with necessary arguments
    //     $command = [
    //         'C:\\Python312\\python.exe', // Path to your Python executable
    //         'C:\\Users\\mdmeh\\OneDrive\\Desktop\\laravel_spa\\script.py', // Path to your script
    //         $mark->student_id,
    //         $mark->subject_id
    //     ];

    //     $process = new Process($command);
    //     $process->run();

    //     // Check if the process executed successfully
    //     if ($process->isSuccessful()) {
    //         $output = $process->getOutput();
    //         $data = json_decode($output, true);

    //         // Update mark with predicted values
    //         $mark->predicted_marks = $data['predicted_marks'];
    //         $mark->recommendations = $data['recommendations'];
    //         $mark->save();

    //         return redirect()->route('teacher.evaluation.predict.mark.result', [
    //             'student_id' => $mark->student_id,
    //             'subject_id' => $mark->subject_id
    //         ]);
    //     } else {
    //         return redirect()->back()->with('error', 'Prediction failed. Please try again.');
    //     }
    // }

    // public function showPredictionResult(Request $request)
    // {
    //     $student_id = $request->input('student_id');
    //     $subject_id = $request->input('subject_id');

    //     $mark = Mark::where('student_id', $student_id)->where('subject_id', $subject_id)->first();
    //     $student = Student::find($student_id);

    //     return view('teacher.prediction-result', compact('mark', 'student'));
    // }


}

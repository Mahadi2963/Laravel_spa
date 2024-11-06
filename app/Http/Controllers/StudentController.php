<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Mark;
use Symfony\Component\Process\Process;


class StudentController extends Controller
{
    //
    public function dashboard()
    {

        return view('student.dashboard');
    }
    public function showSubjects()
    {
        $student = Auth::user()->student; // Assuming `auth()->user()` returns the logged-in user 
        $subjects = $student->subjects; // Assuming the Student model has a subjects relationship 
        return view('student.subjects', compact('subjects'));
    }





    public function showMarks()
    {
        $student = Auth::user()->student; // Get the logged-in student
        $marks = Mark::where('student_id', $student->id)->get(); // Get marks related to this student

        return view('student.marks', compact('marks'));
    }

    public function predictMark(Request $request)
    {
        $markId = $request->input('mark_id');

        // Execute the Python script to predict the mark
        $process = new Process([
            'python',
            'C:/Users/mdmeh/OneDrive/Desktop/Laravel_spa/script.py',
            $markId
        ]);

        $process->run();

        if (!$process->isSuccessful()) {
            return redirect()->back()->withErrors(['error' => $process->getErrorOutput()]);
        }

        $output = $process->getOutput();
        // Assuming the script returns JSON output with predicted marks and recommendations
        $prediction = json_decode($output, true);

        return view('student.predicted-marks', compact('prediction'));
    }
}

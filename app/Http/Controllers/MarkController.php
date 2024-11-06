<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;

class MarkController extends Controller
{
    public function index()
    {
        $marks = Mark::all();
        return view('marks.index', compact('marks'));
    }

    public function predictMarks(Request $request)
    {
        $student_id = $request->input('student_id');
        $subject_id = $request->input('subject_id');

        // Fetch the student and subject data from the database
        $mark = Mark::where('student_id', $student_id)->where('subject_id', $subject_id)->firstOrFail();

        // Execute the Python script
        $process = new Process([
            'python C:/Users/mdmeh/OneDrive/Desktop/Laravel_spa/script.py',
            $student_id,
            $subject_id
        ]);

        $process->run();

        // Executes after the command finishes
        if (!$process->isSuccessful()) {
            return response()->json([
                'message' => 'Prediction failed.',
                'error' => $process->getErrorOutput(),
                'output' => $process->getOutput()  // Added this line to log the output
            ], 500);
        }

        // Update the database with new predicted marks and recommendations
        // Assuming your script updates the database directly

        // Optionally fetch the latest data
        $mark->refresh();

        return response()->json(['message' => 'Prediction successful!', 'mark' => $mark]);
    }
}
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MarkController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;


//landing page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/features', function () {
    return view('features');
})->name('features');


Route::get('/aboutUs', function () {
    return view('aboutUs');
})->name('aboutUs');


Route::get('/contactUs', function () {
    return view('contactUs');
})->name('contactUs');


Route::get('/support', function () {
    return view('support');
})->name('support');





// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');





//Dashboard routes
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    // Add other teacher routes here
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    // Add other student routes here
});





// Profile routes
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');





//Teacher routes
Route::middleware(['auth', 'role:teacher'])->group(function () {

    //subject routes
    Route::get('/teacher/subjects', [TeacherController::class, 'showSubjects'])->name('teacher.subjects');
    Route::get('/teacher/subjects/{subjectId}/students', [TeacherController::class, 'showStudents'])->name('teacher.subjects.students');



    //Evaluation routes
    Route::get('/teacher/evaluation', [TeacherController::class, 'showEvaluationSubjects'])->name('teacher.evaluation');
    Route::get('/teacher/evaluation/{subjectId}/students', [TeacherController::class, 'showEvaluationStudents'])->name('teacher.evaluation.students');
    Route::get('/teacher/evaluation/{subjectId}/students/{studentId}/marks', [TeacherController::class, 'showStudentMarks'])->name('teacher.evaluation.student.marks');
    Route::post('/teacher/evaluation/update-mark', [TeacherController::class, 'updateMark'])->name('teacher.evaluation.update.mark');



    //Prediction routes

    // Route::post('/marks/predict', [MarkController::class, 'predictMark'])->name('marks.predict');
    // Route::get('/marks/predict/result', [MarkController::class, 'showPredictionResult'])->name('marks.predict.result');




    Route::get('/teacher/evaluation', [TeacherController::class, 'showEvaluationSubjects'])->name('teacher.evaluation');
    Route::get('/teacher/evaluation/{subjectId}/students', [TeacherController::class, 'showEvaluationStudents'])->name('teacher.evaluation.students');
    Route::get('/teacher/evaluation/{subjectId}/students/{studentId}/marks', [TeacherController::class, 'showStudentMarks'])->name('teacher.evaluation.student.marks');
    Route::post('/teacher/evaluation/update-mark', [TeacherController::class, 'updateMark'])->name('teacher.evaluation.update.mark');
    Route::post('/teacher/evaluation/predict-mark', [TeacherController::class, 'predictMark'])->name('teacher.evaluation.predict.mark');  // Ensure this line is included

});










Route::get('/marks', [MarkController::class, 'index']);

Route::post('/marks/predict', [MarkController::class, 'predictMarks'])->name('marks.predict');












Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/subjects', [StudentController::class, 'showSubjects'])->name('student.subjects');


    Route::get('/student/evaluation', [StudentController::class, 'showMarks'])->name('student.evaluation');
    Route::post('/student/predict-mark', [StudentController::class, 'predictMark'])->name('student.predict.mark');
});

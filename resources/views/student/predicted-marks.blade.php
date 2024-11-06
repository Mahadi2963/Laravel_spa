@extends('layouts.student')

@section('content')


<div class="container-section">


    <div class="container">
        <h1>Predicted Marks</h1>
        <div class="card">
            <div class="card-header">
                <h5>Predicted Marks and Recommendations</h5>
            </div>
            <div class="card-body">
                <p><strong>Predicted Marks:</strong> {{ $prediction['predicted_marks'] }}</p>
                <p><strong>Recommendations:</strong> {{ $prediction['recommendations'] }}</p>
            </div>
        </div>
    </div>

</div>
@endsection
@extends('layouts.student')

@section('content')

<div class="container-section">

    <div class="container">
        <h1>Your Subjects</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subject Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@endsection
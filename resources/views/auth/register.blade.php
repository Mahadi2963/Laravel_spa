@extends('layouts.before')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .register-form {
            max-width: 400px;
            /* Set a maximum width for the form */
            margin: auto;
            /* Center the form */
            padding: 20px;
            /* Add padding */
            border: 1px solid #ced4da;
            /* Add a border */
            border-radius: 8px;
            /* Round the corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Add a subtle shadow */
            background-color: #fff;
            /* White background */
        }

        .form-group {
            margin-bottom: 1.5rem;
            /* Add margin bottom for spacing */
        }
    </style>
</head>

<body class="bg-dark">

    <div class="container mt-5 flex-grow-1">
        <div class="register-form">
            <h2 class="text-center">Register</h2>

            @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form id="registerForm" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="user_id">User ID</label>
                    <input type="text" class="form-control" name="user_id" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" required>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" class="form-control" name="contact" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>

            <div class="mt-3 text-center">
                <a href="{{ route('login') }}" class="btn btn-link">Already have an account? Login</a>
            </div>
        </div>
    </div>
    <br><br><br><br>

</body>


@endsection
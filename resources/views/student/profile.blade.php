<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>User Profile</title>
    <style>
        .profile-image {
            width: 150px;
            height: 150px;
            overflow: hidden;
            border-radius: 50%;
            margin: 0 auto;
            border: 2px solid #007bff;
            /* Bootstrap primary color */
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .table th {
            background-color: #f8f9fa;
            /* Light background for table headers */
        }

        .container-section {
            padding: 30px;
        }
    </style>
</head>

<body>

    @extends('layouts.student')

    @section('content')

    <div class="container-section">
        <div class="container text-center">
            <h1 class="mb-4">Student Profile</h1>

            <!-- Profile Image -->
            <div class="profile-image mb-3">
                @if($user->image)
                <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->name }}'s Profile Image">
                @else
                <i class="fas fa-user-circle fa-10x text-secondary"></i>
                @endif
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Contact</th>
                                <td>{{ $user->contact }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

    @endsection

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
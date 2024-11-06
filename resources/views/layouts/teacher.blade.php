<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Performance Analyzer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            color: #444;
            background-color: #f0f4f8;
        }

        .navbar {
            background-color: #007bff;
            z-index: 2;

        }

        .navbar-brand,
        .nav-link {
            color: #ffffff !important;
        }

        .nav-link:hover,
        .nav-link:focus {
            color: #d1ecf1 !important;
        }

        .nav-link.btn {
            background-color: #6c757d;
            color: #ffffff !important;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav-link.btn:hover,
        .nav-link.btn:focus {
            background-color: #5a6268;
        }

        .sidebar {
            background-color: #343a40;
            color: #ffffff;
            position: fixed;
            top: 0;
            bottom: 0;
            width: 250px;
            padding-top: 80px;
            transition: width 0.3s;
        }

        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            padding: 15px;
            font-size: 1rem;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .sidebar .sidebar-header {
            font-size: 1.25rem;
            font-weight: bold;
            padding: 10px 15px;
            background-color: #65707c;
            text-align: center;
        }

        .content-section {
            margin-left: 240px;
            padding: 60px;
            margin-top: 46px;
            margin-bottom: 40px;
        }

        .footer {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 0;
            }

            .content-section {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="60"> Student Performance Analyzer
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    {{-- <li class="nav-item">
                        <a class="nav-link btn btn-secondary text-white m-1" href="{{ route('register') }}">Sign Up</a>
                    </li> --}}
                    <li>
                        @auth
                        <a class="nav-link btn btn-secondary text-white m-1" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @else
                        <a class="nav-link btn btn-secondary text-white m-1" href="{{ route('login') }}">Login</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">Navigation</div>
        <a href="{{ route('teacher.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="{{ route('teacher.subjects') }}"><i class="fas fa-book"></i> Subjects</a> <!-- Existing link -->
        <a href="{{ route('teacher.evaluation') }}"><i class="fas fa-check-circle"></i> Evaluation</a> <!-- New link -->
        <a href="{{ route('profile.index') }}"><i class="fas fa-user-cog"></i> Profile Setting</a>
        <a href="{{ route('features') }}"><i class="fas fa-star"></i> Our Features</a>
        <a href="{{ route('aboutUs') }}"><i class="fas fa-info-circle"></i> About Us</a>
        <a href="{{ route('contactUs') }}"><i class="fas fa-envelope"></i> Contact Us</a>
        <a href="{{ route('support') }}"><i class="fas fa-life-ring"></i> Support & Help</a>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>


    <!-- Content Section -->
    <div class="content-section">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p>&copy; 2024 Student Performance Analyzer. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
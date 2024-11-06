<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Performance Analyzer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
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
            /* Light background color */
        }

        .navbar {
            background-color: #007bff;
            /* Primary blue navbar */
        }

        .navbar-brand,
        .nav-link {
            color: #ffffff !important;
            /* White text */
        }

        .nav-link:hover,
        .nav-link:focus {
            color: #d1ecf1 !important;
            /* Light blue text on hover */
        }

        .nav-link.btn {
            background-color: #6c757d;
            /* Secondary button color */
            color: #ffffff !important;
            /* White text */
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav-link.btn:hover,
        .nav-link.btn:focus {
            background-color: #5a6268;
            /* Darker shade for hover */
        }

        #hero {
            background: url('path:images/back.jpg');
            no-repeat center center/cover;
            background-color: #3293A6;
            color: :whitespace;
            /* Adjusted for better visibility */
            height: 100vh;
            display: flex;
            align-items: center;
            text-align: center;
            margin-top: -160px;
        }


        #hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            /* Adds shadow to text */
        }

        #hero p {
            font-size: 18px;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            /* Adds shadow to text */
        }

        #hero .btn {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #6c757d;
            /* Secondary button color */
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        #hero .btn:hover,
        #hero .btn:focus {
            background-color: #5a6268;
            /* Darker shade for hover */
        }

        #content img {
            max-width: 80%;
            margin: 20px 0;
        }

        .content-section {
            padding: 60px 0;
        }

        #features {
            background-color: #eae8e8;
            /* Light grey background */
        }

        #features .feature {
            padding: 20px;
            transition: transform 0.3s, background-color 0.3s;
        }

        #features .feature:hover,
        #features .feature:focus {
            transform: translateY(-10px);
            background-color: #d9e1e8;
            /* Slightly darker grey for hover */
        }

        #about {
            background-color: #c4c2c2;
            /* White background */
        }

        #about img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            transition: transform 0.3s;
        }

        #about img:hover,
        #about img:focus {
            transform: scale(1.1);
        }

        #contact {
            background-color: #9b9b9b;
            /* Light grey background */
        }

        #contact a {
            color: #f7f8fa;
            /* Primary blue for links */
            text-decoration: none;
            transition: color 0.3s;
        }

        #contact a:hover,
        #contact a:focus {
            color: #0056b3;
            /* Darker blue for hover */
        }

        footer {
            background: #007bff;
            /* Primary blue background */
            color: #ffffff;
            /* White text */
            text-align: center;
            padding: 20px 0;
        }

        footer a {
            color: #ffffff;
            text-decoration: none;
        }

        footer a:hover,
        footer a:focus {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}"> <img src="{{ asset('images/logo.png') }}" alt="Logo"
                    height="60"> Student
                Performance
                Analyzer</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link btn btn-secondary text-white  m-1" href="{{ route('register') }}">Sign Up</a>
                    </li>
                    <li>
                        @auth
                        <!-- Show Logout button if user is logged in -->
                        <a class="nav-link btn btn-secondary text-white  m-1" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav-link btn btn-secondary text-white  m-1">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @else
                        <!-- Show Login button if user is not logged in -->
                        <a class="nav-link btn btn-secondary text-white  m-1" href="{{ route('login') }}"
                            class="text-white">Login</a>
                        @endauth
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="py-3 bg-primary text-white fixed-bottom">
        <div class="container text-center">
            <p>&copy; 2024 Student Performance Analyzer. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        #about .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        #about .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        #about .icon-container {
            font-size: 50px;
            color: #007bff;
            margin-top: 15px;
            border: 3px solid #007bff;
            padding: 15px;
            border-radius: 50%;
        }
    </style>
</head>

<body>

    @extends('layouts.teacher')

    @section('content')

    <div class="container-section">

        <!-- About Us Section -->
        <section id="about" class="py-5 bg-light text-dark">
            <div class="container">
                <h2 class="text-center mb-4 bg-dark text-white">About Us</h2>
                <p class="text-center mb-5 lead">We are a dedicated team of educators and technologists committed to
                    leveraging data and analytics to improve student outcomes. Our mission is to empower educators with
                    tools and insights to support every student.</p>

                <div class="row text-center">
                    <!-- Our Team -->
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="icon-container mx-auto">
                                <i class="fas fa-users"></i> <!-- Team Icon -->
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Our Team</h4>
                                <p class="card-text">Experienced educators and tech enthusiasts working together.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Our Mission -->
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="icon-container mx-auto">
                                <i class="fas fa-bullseye"></i> <!-- Mission Icon -->
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Our Mission</h4>
                                <p class="card-text">Leveraging technology to enhance educational outcomes and student
                                    success.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Our Values -->
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="icon-container mx-auto">
                                <i class="fas fa-lightbulb"></i> <!-- Values Icon -->
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Our Values</h4>
                                <p class="card-text">Innovation, Integrity, and Impact.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    @endsection

</body>

</html>
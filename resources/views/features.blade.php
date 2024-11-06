<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    @extends('layouts.teacher')

    @section('content')

    <div class="container-section">
        <section id="features" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5 bg-dark text-white">Features</h2>
                <div class="row text-center">
                    <!-- Real-Time Analysis Feature -->
                    <div class="col-md-4 mb-4">
                        <div class="feature-card p-4 rounded shadow-sm h-100">
                            <div class="icon mb-3">
                                <i class="fas fa-chart-line fa-3x text-primary"></i>
                            </div>
                            <h3 class="h5">Real-Time Analysis</h3>
                            <p>Get up-to-date insights on student performance.</p>
                        </div>
                    </div>

                    <!-- Predictive Analytics Feature -->
                    <div class="col-md-4 mb-4">
                        <div class="feature-card p-4 rounded shadow-sm h-100">
                            <div class="icon mb-3">
                                <i class="fas fa-brain fa-3x text-success"></i>
                            </div>
                            <h3 class="h5">Predictive Analytics</h3>
                            <p>Utilize machine learning to forecast student outcomes.</p>
                        </div>
                    </div>

                    <!-- Personalized Recommendations Feature -->
                    <div class="col-md-4 mb-4">
                        <div class="feature-card p-4 rounded shadow-sm h-100">
                            <div class="icon mb-3">
                                <i class="fas fa-user-check fa-3x text-warning"></i>
                            </div>
                            <h3 class="h5">Personalized Recommendations</h3>
                            <p>Receive tailored advice to improve student success.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @endsection



</body>

</html>
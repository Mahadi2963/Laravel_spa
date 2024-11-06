@extends('layouts.teacher')

@section('content')

<div class="container-section">
    <div class="container my-5">
        <h1 class="text-center mb-4 bg-dark text-white">Support & Help</h1>

        <!-- Introduction Section -->
        <div class="support-intro text-center mb-5">
            <p>Welcome to our Support & Help page! Here, you'll find resources and information to help you use our
                platform efficiently. If you still have questions, feel free to reach out to our support team.</p>
        </div>

        <!-- Support Topics Section -->
        <div class="support-topics mb-5">
            <h2 class="text-center mb-4 ">Common Support Topics</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 border-0">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-user-circle fa-2x text-primary mb-3"></i></h5>
                            <h6 class="card-title">Account Setup</h6>
                            <p class="card-text">Learn how to set up your account, update your profile, and manage
                                account settings.</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 border-0">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-book fa-2x text-primary mb-3"></i></h5>
                            <h6 class="card-title">Subjects & Marks</h6>
                            <p class="card-text">Get help with viewing and understanding subjects, marks, and
                                evaluations.</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 border-0">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-chart-line fa-2x text-primary mb-3"></i></h5>
                            <h6 class="card-title">Mark Predictions</h6>
                            <p class="card-text">Find out how to access and understand the mark prediction feature.</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
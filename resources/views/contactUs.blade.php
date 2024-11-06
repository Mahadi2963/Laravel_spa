<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #contact .input-group-text {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        #contact .form-control {
            border-left: none;
            box-shadow: none;
        }

        #contact button.btn-primary {
            transition: background-color 0.3s ease;
        }

        #contact button.btn-primary:hover {
            background-color: #0056b3;
            /* Darker shade for hover effect */
        }
    </style>
</head>

<body>




    @extends('layouts.teacher')



    @section('content')


    <!-- Contact Us Section -->
    <section id="contact" class="py-5 bg-light text-dark">
        <div class="container">
            <h2 class="text-center mb-4 bg-dark text-white">Get in Touch</h2>
            <p class="text-center mb-5">Have questions or feedback? Reach out to us by email at
                <a href="mailto:info@studentperformanceanalyzer.com"
                    class="text-primary">info@studentperformanceanalyzer.com</a>
                or fill out the form below. We’d love to hear from you!
            </p>

            <form action="#" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control rounded-right" id="name" name="name"
                                    placeholder="Your Name" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label for="email" class="font-weight-bold">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control rounded-right" id="email" name="email"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label for="message" class="font-weight-bold">Message</label>
                    <textarea class="form-control rounded" id="message" name="message" rows="5"
                        placeholder="Your Message" required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg px-5">Send Message</button>
                </div>
            </form>
        </div>
    </section>



    @endsection


</body>

</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('/')}}website/css/bootstrap.css"/>
    <link rel="stylesheet" href="{{asset('/')}}website/css/all.css"/>
    <link rel="stylesheet" href="{{asset('/')}}website/css/ecom.css"/>
    <link rel="stylesheet" href="{{asset('/')}}website/css/style.css"/>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow">
        <div class="container">
            <a href="" class="navbar-brand">LOGO</a>
            <ul class="navbar-nav">
                <li><a href="{{route('home')}}" class="nav-link">Home</a></li>
                <li><a href="{{route('about')}}" class="nav-link">About Us</a></li>
                <li><a href="{{route('course')}}" class="nav-link">All Course</a></li>
                <li><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
                @if(Session::get('student_id'))
                    <li class="dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{Session::get('student_name')}}</a>
                        <ul class="dropdown-menu">
                            <li><a href=""class="dropdown-item">Dashboard</a></li>
                            <li><a href="{{route('student.logout')}}"class="dropdown-item">Logout</a></li>
                        </ul>
                    </li>

                @else
                    <li><a href="{{route('login-registration')}}" class="nav-link">Login / Registration</a></li>

                @endif
            </ul>
        </div>
    </nav>

    @yield('content')

    <footer>
        <section class="py-5 bg-secondary">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-body h-100">
                            <h4 class="text-center">Why Choice US</h4>
                            <hr/>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad alias, aspernatur assumenda aut blanditiis ducimus excepturi fuga fugiat illum inventore laboriosam maxime minus molestias non quas quasi quos veniam voluptatem?</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-body h-100 ">
                            <h4 class="text-center">Popular Course</h4>
                            <hr/>
                            <ul class="navbar-nav list-group">
                                <li><a href="" class="nav-link list-group-item ">Web Development</a></li>
                                <li><a href="" class="nav-link list-group-item">Android Development</a></li>
                                <li><a href="" class="nav-link list-group-item ">Master in English</a></li>
                                <li><a href="" class="nav-link list-group-item ">Master in Higher Math</a></li>
                                <li><a href="" class="nav-link list-group-item ">Master in Physics</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-body h-100">
                            <h4 class="text-center">Contact With Us</h4>
                            <hr/>
                            <p>
                                House # 420, Road # 120, West Dhanmondi, Dhaka 1209 <br/>
                                Email: info@example.com <br/>
                                Phone: 01715465789
                            </p>
                            <hr/>
                            <ul class="nav">
                                <li><a href="" class="nav-link"> <i class="fa-brands fa-2x fa-facebook-square"></i> </a></li>
                                <li><a href="" class="nav-link"> <i class="fa-brands fa-2x fa-twitter-square"></i> </a></li>
                                <li><a href="" class="nav-link"> <i class="fa-brands fa-2x fa-linkedin-in"></i> </a></li>
                                <li><a href="" class="nav-link"> <i class="fa-brands fa-2x fa-github-square"></i> </a></li>
                                <li><a href="" class="nav-link"> <i class="fa-brands fa-2x fa-google-plus-square"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-dark py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center text-white mb-0">Design & Developed By - Web Development Batch Five</p>
                    </div>
                </div>
            </div>
        </section>
    </footer>

    <script src="{{asset('/')}}website/js/jquery-3.6.0.js"></script>
    <script src="{{asset('/')}}website/js/bootstrap.js"></script>
</body>
</html>

@extends('website.master')


@section('title')
   {{Session::get('student_name')}} Dashboard
@endsection

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body">
                        <div class="list-group">
                            <a href="" class="list-group-item">My Profile</a>
                            <a href="{{route('student.courses')}}" class="list-group-item">My Course</a>
                            <a href="" class="list-group-item">My Study</a>
                            <a href="" class="list-group-item">My Account</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-body">
                        <h1>My Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

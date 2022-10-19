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
                        <h3 class="text-center">My Enrolled Courses</h3>
                        <hr/>
                        <div>
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Title</th>
                                    <th>teacher Info</th>
                                    <th>Course Starting Date</th>
                                    <th>Course Ending Date</th>
                                    <th>Course Fee </th>
                                    <th>Course Payment Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($enrolledCourses as $enrolledCourses)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$enrolledCourses->course->title}}</td>
                                    <td>{{$enrolledCourses->course->teacher->name}}</td>
                                    <td>{{$enrolledCourses->course->start_date}}</td>
                                    <td>{{$enrolledCourses->course->fee}}</td>
                                    <td>{{$enrolledCourses->course->status}}</td>
                                </tr>
                                @endforeach
                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection


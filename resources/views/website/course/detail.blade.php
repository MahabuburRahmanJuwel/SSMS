@extends('website.master')

@section('title')
    {{$course->title}}
@endsection

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
              <div class="col-md-6">
                  <div class="card card-body">
                      <img src="{{asset($course->image)}}" alt="" class=""  >
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="card card-body">
                      <h1>{{$course->title}}</h1>
                      <h4>Trainee Name : {{$course->teacher->name}}</h4>
                      <h5>Course fee : {{$course->fee}}</h5>
                      <h6>Class Start Date : {{$course->start_date}}</h6>
                      <hr/>
                      <p>{{$course->short_description}}</p>
                      <hr/>
                      <a href="{{route('enroll',['id'=>$course->id])}}" class="btn btn-outline-success px-5 {{$check == true ? 'disabled' : ' '}}" >Enroll Now</a>
                  </div>
              </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body">
                        {!! $course->short_description !!}
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

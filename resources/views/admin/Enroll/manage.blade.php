@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Enroll Student Info</h4>
                    @if($message = Session::get('message'))
                        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                            {{$message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Info</th>
                            <th>Teacher Info</th>
                            <th>Student Info</th>
                            <th>Starting Date</th>
                            <th>Enroll Status</th>
                            <th>payment Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($enrolls as $enroll)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$enroll->course->title.'(TK.'.$enroll->course->fee.')'}}</td>
                                <td>{{$enroll->course->teacher->name.'('.$enroll->course->teacher->mobile.')'}}</td>
                                <td>{{isset($enroll->student->name) ? $enroll->student->name.'('.$enroll->student->mobile.')' : ''}}</td>
                                <td>{{$enroll->course->starting_date}}</td>
                                <td>{{$enroll->enroll_status}}</td>
                                <td>
                                    <a href="{{route('admin.enroll-update-status', ['id' => $enroll->id])}}"
                                       class="btn {{$enroll->enroll_status == 'Complete' ? 'btn-success disabled' : 'btn-danger'}}"
                                        onclick="return confirm('Are you sure to change this..')">
                                        <i class="fa fa-arrow-up"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

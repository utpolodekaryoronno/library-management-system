@extends('layouts.app')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title mb-2">All Students</h3>
                        <a class="btn btn-primary" href="{{ route('students.create') }}"> Add New Student</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-12">
                        @include("layouts.components.message")
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Student Id</th>
                                            <th>Address</th>
                                            <th>Profile</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        <tr>
                                            <td>{{$loop ->iteration}}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>{{ $student->student_id }}</td>
                                            <td>{{ $student->address }}</td>
                                            <td>
                                                <img src="{{ asset('media/student/' . $student->photo) }}" alt="Cover" width="50" height="50" class="rounded">
                                            </td>
                                             <td>{{ \Carbon\Carbon::parse($student->created_at)->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm"><i class="fe fe-eye"></i></a>
                                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm"><i class="fe fe-pencil"></i></a>
                                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                        <i class="fe fe-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection

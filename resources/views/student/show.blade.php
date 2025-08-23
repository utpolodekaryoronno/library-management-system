@extends('layouts.app')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Show Student</h3>
                        <a href="{{ route('students.index') }}">Back</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="profile-header">
                        <div class="row align-items-center">
                            <div class="col-auto profile-image">
                                <a href="#">
                                    <img class="rounded-circle" alt="User Image" src="{{ asset('media/student/' .$student->photo) }}">
                                </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-0">{{$student->name}}</h4>
                                <h6 class="text-muted">{{$student->email}}</h6>
                                <div class="user-Location"><i class="fa fa-map-marker"></i> &nbsp;{{$student->address}}</div>
                                <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                            </div>
                            <div class="col-auto profile-btn">
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content">
                        <!-- Personal Details Tab -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Personal Details</span>
                                                <a class="edit-link" href="{{ route('students.edit', $student->id) }}"><i class="fa fa-edit mr-1"></i>Edit</a>
                                            </h5>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted mb-0 mb-sm-3">Name :</p>
                                                <p class="col-sm-10">{{ $student->name }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted mb-0 mb-sm-3">Email :</p>
                                                <p class="col-sm-10">{{ $student->email }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted mb-0 mb-sm-3">Phone :</p>
                                                <p class="col-sm-10">{{ $student->phone }}</p>
                                            </div>
                                             <div class="row">
                                                <p class="col-sm-2 text-muted mb-0 mb-sm-3">Phone :</p>
                                                <p class="col-sm-10">{{ $student->student_id }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted mb-0 mb-sm-3">Address :</p>
                                                <p class="col-sm-10">{{ $student->address }}, <br> Bangladesh</p>
                                            </div>
                                            <div class="row">
                                                    <p class="col-sm-2 mb-0 mb-sm-3 p-3"><strong>Borrowed Book</strong> :</p>
                                                    <h6 class="col-sm-10">
                                                        @foreach ($thisStudentBorrowedList as $borrow)
                                                            <p ><img class="rounded" height="70" width="60" src="{{ asset('media/book/' . $borrow->book_cover) }}" alt=""> {{ $borrow->book_title }} <span class="text-muted"> ({{ \Carbon\Carbon::parse($borrow->created_at)->format('d M Y') }} - {{ \Carbon\Carbon::parse($borrow->return_date)->format('d M Y') }})</span></p>
                                                        @endforeach
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <!-- /Personal Details Tab -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

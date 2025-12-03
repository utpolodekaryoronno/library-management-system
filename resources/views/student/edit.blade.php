@extends('layouts.app')
@section('content')

	@include('layouts.components.header')
	@include('layouts.components.sidebar')


        <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Update Student</h3>
                        <a href="{{ url('/') }}">Back</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                 <div class="col-md-10">
                    @include('layouts.components.message')
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" readonly name="email" class="form-control" value="{{ old('email', $student->email) }}">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $student->phone) }}">
                                </div>
                                <div class="form-group">
                                    <label>Student Id</label>
                                    <input type="text" readonly name="student_id" class="form-control" value="{{ old('student_id', $student->student_id) }}">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ old('address', $student->address) }}">
                                </div>
                               <div class="form-group">
                                    <label class="d-block">Photo</label>

                                    <label for="photo" class="cover">
                                        <img id="previewImage" src="{{ asset('media/student/' .$student->photo) }}" alt="Profile Image">
                                    </label>
                                    <input class="form-control" hidden type="file" id="photo" name="photo" onchange="previewFile(this)">
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

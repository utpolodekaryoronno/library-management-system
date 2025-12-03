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
                    <div class="col-sm-12">
                        <h3 class="page-title mb-2">Student Search</h3>
                        <a class="btn btn-primary" href="{{ route('borrows.index') }}"> Back</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-12">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            {{-- Student Search --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Search Student</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('borrow.student.search') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Student ID / Phone / Email</label>
                                    <input type="text" class="form-control" name="search">
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Some Students  --}}
            <div class="row">
                @if($students->isEmpty())
                    <div class="col-12">
                        <div class="alert alert-warning">No students found.</div>
                    </div>
                @endif
                @foreach ($students as $student)
                    <div class="col-12 col-md-4 col-lg-3 d-flex">
                        <div class="card flex-fill">
                            <img alt="Card Image" src="{{ asset('media/student/' .$student->photo) }}" class="card-img-top student-card-img">
                            <div class="card-header">
                                <h5 class="card-title mb-0">{{$student->name}}</h5>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-primary" href="{{ route('book.assign', $student->id) }}">Assign Book</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection

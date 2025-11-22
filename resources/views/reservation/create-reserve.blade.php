@extends('layouts.app')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Book Reservations</h3>
                        <a href="{{ route('reservations.index') }}">Back</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->


             <div class="row mt-4">
                <div class="col-md-8">
                    @include("layouts.components.message")
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Book Reservations Form</h4>

                            <form action="{{ route('reservations.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="student">Select Student</label>
                                    <select class="form-control" id="student" name="student_id">
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}">
                                                {{ $student->name }} ({{ $student->student_id }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="book">Select Book</label>
                                    <select class="form-control" id='book' name="book_id">
                                        @foreach($books as $book)
                                            <option value="{{ $book->id }}">
                                                {{ $book->title }} ({{ $book->author }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Create a Reserve</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

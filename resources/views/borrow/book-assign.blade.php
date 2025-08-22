@extends('layouts.app')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Book Assign</h3>
                        <a href="{{ route('borrow.search') }}">Back</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-8">
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
                        </div>
                    </div>
                </div>
            </div>

             <div class="row mt-4">
                <div class="col-md-8">
                    @include("layouts.components.message")
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Book Assign Form</h4>

                            <form action="{{ route('borrows.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="book">Select Book</label>
                                    <select class="form-control" id='book' name="book_id">
                                        @foreach($books as $book)
                                             @if ($book->available_copy > 0)
                                                <option value="{{ $book->id }}">
                                                    {{ $book->title }} ({{ $book->author }})
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="returnDate">Return Date</label>
                                    <input type="date" class="form-control" id="returnDate" name="return_date" required>
                                    <input type="hidden"  name="student_id" value="{{ $student->id }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Create a Borrow</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

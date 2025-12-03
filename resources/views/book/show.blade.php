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
                        <h3 class="page-title">Show Book</h3>
                        <a href="{{ route('books.index') }}">Back</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('media/book/' . $book->cover) }}" class="card-img-top" alt="Book Cover" height="500">
                            <h4 class="card-title mt-3">{{ $book->title }}</h4>
                            <p class="card-text"><strong>লেখক: </strong>{{ $book->author }}</p>
                            <p class="card-text"><strong>ISBN: </strong>{{ $book->isbn }}</p>
                            <p class="card-text"><strong>প্রকাশের সময়: </strong>{{ \Carbon\Carbon::parse($book->created_at)->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3">Borrowing List</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Borrowed At</th>
                                        <th>Return Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($thisBookBorrowedList as $borrow)
                                        <tr>
                                            <td><img height="40" width="40" class="rounded-circle" src="{{ asset('media/student/' . $borrow->student_photo) }}" alt="student-photo"> &nbsp; {{ $borrow->student_name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($borrow->created_at)->format('d M Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($borrow->return_date)->format('d M Y') }}</td>
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
@endsection

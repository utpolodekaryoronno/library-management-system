@extends('layouts.app')
@section('content')
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
            </div>
        </div>
    </div>
@endsection

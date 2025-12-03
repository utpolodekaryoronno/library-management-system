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
                        <h3 class="page-title mb-2">All Books</h3>
                        <a class="btn btn-primary" href="{{ route('books.create') }}"> Add New Book</a>
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
                                            <th>Cover</th>
                                            <th>Book Title</th>
                                            <th>Author</th>
                                            <th>ISBN</th>
                                            <th>Total Copies</th>
                                            <th>Available Copy</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                        <tr>
                                            <td>{{$loop ->iteration}}</td>
                                            <td>
                                                <img src="{{ asset('media/book/' . $book->cover) }}" alt="Cover" width="50" height="60" class="rounded">
                                            </td>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->isbn }}</td>
                                            <td class="text-center">{{ $book->copy }}</td>
                                            <td class="text-center">{{ $book->available_copy }}</td>
                                            <td>{{ \Carbon\Carbon::parse($book->created_at)->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm"><i class="fe fe-eye"></i></a>
                                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm"><i class="fe fe-pencil"></i></a>
                                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
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

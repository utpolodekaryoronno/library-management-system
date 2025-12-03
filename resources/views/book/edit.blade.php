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
                        <h3 class="page-title">Update Book</h3>
                        <a href="{{ route('books.index') }}">Back</a>
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
                            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <label>Book Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title', $book->title )}}">
                                </div>
                                <div class="form-group">
                                    <label>Author</label>
                                    <input type="text" name="author" class="form-control" value="{{ old('author', $book->author) }}">
                                </div>
                                <div class="form-group">
                                    <label>ISBN Number</label>
                                    <input type="text" name="isbn" class="form-control" value="{{ old('isbn', $book->isbn) }}">
                                </div>
                                <div class="form-group">
                                    <label>Copy</label>
                                    <input type="text" name="copy" class="form-control" value="{{ old('copy', $book->copy) }}">
                                </div>
                               <div class="form-group">
                                    <label class="d-block">Cover</label>


                                    <label for="cover" class="cover">
                                        <img id="previewImage" src="{{ asset('media/book/' .$book->cover) }}" alt="Cover Image">
                                    </label>
                                    <input class="form-control" hidden type="file" id="cover" name="cover" onchange="previewFile(this)">
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

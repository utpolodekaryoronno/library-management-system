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
                        <h3 class="page-title">Book Reservations</h3>
                        <a href="{{ route('reservation.index') }}">Back</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->


             <div class="row mt-4">
                <div class="col-md-8">
                    @include("layouts.components.message")
                    <div class="card">
                        <div class="card-body">
                            <p><strong>Student:</strong> {{ $reservation->student_name }}</p>
                            <p><strong>Book:</strong> {{ $reservation->book_title }}</p>

                            <form action="{{ route('reservation.approve', $reservation->id) }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Return Date</label>
                                    <input type="date" name="return_date" class="form-control">
                                </div>

                                <button class="btn btn-success">Approve & Borrow</button>
                                <a href="{{ route('reservation.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

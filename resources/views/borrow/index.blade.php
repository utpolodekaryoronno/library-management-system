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
                        <h3 class="page-title mb-2">All Borrowing</h3>
                        <a class="btn btn-primary" href="{{ route('borrow.search') }}"> Add New Borrow</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-12">
                        @include("layouts.components.message")
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('borrows.index') }}">All Borrows</a>
                            <a class="btn btn-success" href="{{ route('overdue.borrows') }}">Go Overdue</a>
                        </div>
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
                                            <th>Student Name</th>
                                            <th>Book Title</th>
                                            <th>Issue Date</th>
                                            <th>Return Date</th>
                                            <th>Created At</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($borrows as $borrow)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img height="50" class="rounded" src="{{ 'media/student/' . $borrow->student_photo }}" alt=""> &nbsp; {{ $borrow->student_name}}</td>
                                                <td><img height="80" width="70" class="rounded" src="{{ 'media/book/' . $borrow->book_cover }}" alt=""> &nbsp; {{$borrow->book_title}} </td>
                                                <td>{{ date('F d, Y', strtotime($borrow->issue_date)) }}</td>
                                                {{-- For Return Date --}}
                                                @php
                                                    $daysLeft = ceil(\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($borrow->return_date), false));
                                                @endphp

                                                <td>
                                                    @if ($daysLeft > 0)
                                                        {{ $daysLeft }} Days
                                                    @elseif ($daysLeft == 0)
                                                        <span class="text-danger">Due Today</span>
                                                    @else
                                                        <span class="text-danger">{{ abs($daysLeft) }} Days Delayed</span>
                                                    @endif
                                                </td>
                                                <td>{{\Carbon\Carbon::parse($borrow->created_at)->diffForHumans()}}</td>
                                                <td class="text-center">
                                                    @if ($borrow->status == "returned")
                                                        <span class="btn btn-rounded btn-success">Returned</span>
                                                    @elseif ($daysLeft <= 0)
                                                        <span class="btn btn-rounded btn-danger">Overdue</span>
                                                    @else
                                                        <span class="btn btn-rounded btn-warning">Pending</span>
                                                    @endif
                                                </td>

                                                <td class="text-right"><a href="{{ route('book.returned', $borrow->id) }}" class="btn btn-primary return-btn">Make Return</a></td>
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

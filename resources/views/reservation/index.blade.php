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
                        <h3 class="page-title mb-3">📚 Book Reservations</h3>
                        <a class="btn btn-primary" href="{{ route('dashboard') }}">Back</a>
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
                                            <th>Reservation At</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reservations as $reservation)
                                            <tr>
                                               <td>{{ $loop->iteration }}</td>
                                                <td>{{ $reservation->student_name }}</td>
                                                <td><img height="60" width="50" class="rounded" src="{{asset('media/book/' . $reservation->book_cover)}}" alt=""> {{ $reservation->book_title }}</td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($reservation->created_at)->diffForHumans() }}
                                                    ({{ \Carbon\Carbon::parse($reservation->created_at)->format('d M Y') }})
                                                </td>
                                                <td>
                                                    <span class="badge bg-info">
                                                        {{ ucfirst($reservation->status) }}
                                                    </span>
                                                </td>
                                                <td class="text-right">
                                                   @if($reservation->status == 'pending')
                                                        @if ($reservation->available_copy > 0)
                                                            <a href="{{ route('reservation.approve.form', $reservation->id) }}"
                                                            class="btn btn-success btn-sm">
                                                                Approve
                                                            </a>
                                                        @else
                                                            <span class="badge bg-warning py-2">Waiting for return</span>
                                                        @endif

                                                        <form action="{{ route('reservation.cancel', $reservation->id) }}" method="POST" style="display:inline">
                                                            @csrf
                                                            <button class="btn btn-danger btn-sm">Cancel</button>
                                                        </form>
                                                    @endif

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
@endsection

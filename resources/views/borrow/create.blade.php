@extends('layouts.app')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Add New Borrow</h3>
                        <a href="{{ url('/') }}">Back</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                 <div class="col-md-10">
                    @include('layouts.components.message')
                </div>
            </div>

        </div>
    </div>
@endsection

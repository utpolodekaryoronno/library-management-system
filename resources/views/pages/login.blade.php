@extends('layouts.app')
@section('title', 'login LMS')

@section('content')

    <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light py-5">
        <div class="card shadow-lg border-0" style="max-width: 420px; width: 100%;">
            <div class="card-body p-4">

                <!-- Logo / Title -->
                <div class="text-center mb-5">
                    <div class="mb-4">
                       <i class="fa fa-book fa-5x text-primary"></i>
                    </div>
                    <h3 class="fw-bold text-dark">Library Management System</h3>
                    <p class="text-muted small">Librarian Portal • Secure Access</p>
                </div>



                <form method="POST" action="{{ route('librarian.login.store') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold text-dark">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                              <i class="fa fa-envelope text-primary"></i>
                            </span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                   class="form-control form-control-lg border-start-0 ps-0"
                                   placeholder="admin@example.com">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold text-dark">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                              <i class="fa fa-lock text-primary"></i>
                            </span>
                            <input id="password" type="password" name="password"
                                   class="form-control form-control-lg border-start-0 ps-0"
                                   placeholder="Enter your password">
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label text-muted" for="remember">
                                Remember me
                            </label>
                        </div>

                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill shadow-sm">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        Login as Librarian
                    </button>
                </form>


            </div>
        </div>
    </div>

@endsection

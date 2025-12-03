
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Library • Library Management System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body class="bg-dark">

<!-- Hero Section -->
<section class="hero-section d-flex align-items-center">
    <div class="container hero-content">
        <div class="row align-items-center g-5">

            <!-- Left: Text & CTA -->
            <div class="col-md-7 text-white text-center text-md-start">
                <div class="mb-5">
                    <span class="badge bg-white text-primary px-4 py-3 rounded-pill fw-bold shadow-sm">
                        <i class="bi bi-stars me-2"></i> Modern Library Management
                    </span>
                </div>

                <h1 class="display-5 fw-bold mb-4">
                    Welcome to

                    <span style="background: linear-gradient(90deg, #a78bfa, #ec4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        Library Management System
                    </span>
                </h1>

                <p class="mb-5">
                    A secure, powerful, and easy-to-use platform designed exclusively for librarians
                    to manage books, students, and borrowing records efficiently.
                </p>

                <!-- Feature Icons -->
                <div class="row g-4 mb-5">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center text-white">
                        <div class="flex-shrink-0 bg-white bg-opacity-25 rounded-circle p-3 me-4 d-flex align-items-center justify-content-center"
                            style="width: 62px; height: 62px;">
                            <i class="bi bi-book-fill fs-3 text-primary"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1 text-white">Book Tracking</h5>
                            <small class="text-white-75">Real-time inventory & availability</small>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="d-flex align-items-center text-white">
                        <div class="flex-shrink-0 bg-white bg-opacity-25 rounded-circle p-3 me-4 d-flex align-items-center justify-content-center"
                            style="width: 62px; height: 62px;">
                            <i class="bi bi-person-check-fill fs-3 text-success"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1 text-white">Student Records</h5>
                            <small class="text-white-75"> borrowing history</small>
                        </div>
                    </div>
                </div>


            </div>

                <!-- CTA Buttons -->
                <div class="d-grid d-sm-flex gap-4 justify-content-center justify-content-md-start">
                    <a href="{{ route('librarian.login') }}" class="btn btn-primary-custom btn-md">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        Librarian Login
                    </a>
                    <a href="#" class="btn btn-outline-light btn-md rounded-pill px-5 d-flex justify-content-center align-items-center">
                        <i class="bi bi-play-circle me-2"></i> Watch Demo
                    </a>
                </div>

                <div class="mt-5 text-white-75">
                    <i class="bi bi-shield-lock-fill me-2"></i>
                    Secure • Fast • Built for Librarians Only
                </div>
            </div>

            <!-- Right: Illustration + Floating Stats -->
            <div class="col-md-5 text-end position-relative">
                <!-- Main Illustration -->
                <div class="glass-card p-5 float-animation d-inline-block">
                    <img src="https://cdn-icons-png.flaticon.com/512/2874/2874802.png"
                         alt="Library Illustration"
                         class="img-fluid"
                         style="max-height: 400px;">
                </div>

                <!-- Floating Stats -->
                <div class="position-absolute top-0 start-0 translate-middle">
                    <div class="stat-card float-animation" style="animation-delay: 1s;">
                        <h3 class="mb-0 fw-bold">10K+</h3>
                        <small>Books</small>
                    </div>
                </div>

                <div class="position-absolute bottom-0 end-0 translate-middle">
                    <div class="stat-card float-animation bg-success bg-opacity-80" style="animation-delay: 2s;">
                        <h3 class="mb-0 fw-bold">99%</h3>
                        <small>On-Time Return</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-black text-white py-4 border-top border-secondary">
    <div class="container text-center">
        <p class="mb-0">
            © {{ date('Y') }} <strong>Smart Library Management System</strong> •
            Made with <span class="text-danger">♥</span> for Librarians
        </p>
    </div>
</footer>

<!-- Bootstrap 5 JS (Optional - only if you need popovers/toasts later) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

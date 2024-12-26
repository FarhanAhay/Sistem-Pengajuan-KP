<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">WEBSITE PENGAJUAN PROPOSAL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-primary mx-2">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <header class="text-center text-white py-5" style="background: url({{ asset('images/stmikbdg.jpg') }}) no-repeat center center/cover; min-height: 500px;">
        <div class="container bg-dark bg-opacity-50 py-5">
            <h1 class="fw-bold">Selamat Datang di Website Pengajuan Proposal STMIK BANDUNG !!!</h1>
            <p class="lead">Your one-stop solution for web development</p>
            <a href="#features" class="btn btn-light btn-lg">Learn More</a>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Features</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <i class="bi bi-speedometer2 display-4 text-primary"></i>
                    <h4 class="mt-3">Fast Performance</h4>
                    <p>Penggunaan website ini dapat mempermudah mahasiswa mengajukan proposal KP.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-shield-lock display-4 text-primary"></i>
                    <h4 class="mt-3">Secure</h4>
                    <p>Menyimpan data pengguna secara aman.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-layout-text-sidebar-reverse display-4 text-primary"></i>
                    <h4 class="mt-3">Easy to Use</h4>
                    <p>Sangat mudah untuk di gunakan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">About Us</h2>
            <p class="text-center">We are dedicated to providing the best web development services to our clients. Our team of experts works tirelessly to bring your ideas to life.</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Contact Us</h2>
            <form action="/contact" method="POST">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Your Message" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 STMIK BANDUNG. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

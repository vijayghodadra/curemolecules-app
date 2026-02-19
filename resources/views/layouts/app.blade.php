<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CureMolecules - @yield('title', 'High-Purity Pharmaceutical APIs & Excipients')</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Antigravity: AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @yield('styles')
</head>
<body>

    <header>
        <div class="container navbar">
            <a href="{{ route('home') }}" class="logo-container" style="text-decoration: none;">
                <img src="{{ asset('assets/images/DEVSEAS logo.png') }}" alt="Cure Molecules" class="site-logo">
            </a>

            <ul class="nav-menu">
                <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}">Products <i class="fas fa-chevron-down" style="font-size: 0.7em;"></i></a>
                    <div class="dropdown-menu">
                        <a href="{{ route('products.index') }}" class="dropdown-item">All Products</a>
                        <a href="{{ route('products.index') }}" class="dropdown-item">Antacids & Laxatives</a>
                        <a href="{{ route('products.index') }}" class="dropdown-item">Food & Beverages & Pharma</a>
                        <a href="{{ route('products.index') }}" class="dropdown-item">ORS & Injectables</a>
                        <a href="{{ route('products.index') }}" class="dropdown-item">Pharma & Nutraceuticals</a>
                    </div>
                </li>
                <li><a href="{{ url('/about') }}">About Us</a></li>
                <li class="nav-item">
                    <a href="{{ url('/services') }}">Services <i class="fas fa-chevron-down" style="font-size: 0.7em;"></i></a>
                    <div class="dropdown-menu">
                        <a href="{{ url('/services') }}" class="dropdown-item">Chemical Trading</a>
                        <a href="{{ url('/quality') }}" class="dropdown-item">Quality Assurance</a>
                        <a href="{{ url('/logistics') }}" class="dropdown-item">Global Logistics</a>
                    </div>
                </li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>

            <div class="theme-toggle">
                <i class="fas fa-sun"></i>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- Enhanced Footer -->
    <footer class="main-footer" data-aos="fade-up">
        <div class="container">
            <div class="footer-top">
                <div class="footer-logo-col">
                    <div class="logo-container" style="background: transparent; color: white; padding: 0;">
                        <i class="fas fa-cubes fa-2x" style="color: var(--primary);"></i>
                        <div class="logo-text" style="color: white;">
                            CURE<br>MOLECULES<br><small style="color: #94a3b8;">PRIVATE LIMITED</small>
                        </div>
                    </div>
                    <p>Global leader in immediate relief antacid actives, electrolytes, and pharmaceutical excipients. Specializing in Aluminium, Magnesium and Potassium products with strict quality control and IP/BP/USP compliance.</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <div class="footer-links">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul>
                        <li><a href="{{ url('/about') }}">About Us</a></li>
                        <li><a href="{{ route('products.index') }}">Products</a></li>
                        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                    </ul>
                </div>

                <div class="footer-links">
                    <h4 class="footer-heading">Product Categories</h4>
                    <ul>
                        <li><a href="{{ route('products.index') }}">Pharmaceutical Excipients</a></li>
                        <li><a href="{{ route('products.index') }}">Dextrose Products</a></li>
                        <li><a href="{{ route('products.index') }}">Antacid Products</a></li>
                        <li><a href="{{ route('products.index') }}">Industrial Chemicals</a></li>
                    </ul>
                </div>

                <div class="footer-links">
                    <h4 class="footer-heading">Contact Info</h4>
                    <ul class="contact-info-list">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>B-408, Rudra Arcade, Near Sunflower Women's Hospital – Helmet Cross Road, Memnagar, Ahmedabad – 380052</span>
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <span>+91–9725597101, +91–7383565553</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>divy@curemolecules.com</span>
                        </li>
                        <li>
                            <i class="fas fa-user"></i>
                            <span>Mr. Divya Patel (Director)</span>
                        </li>
                         <li>
                            <i class="fas fa-user"></i>
                            <span>Mr. Vishal Patel (Director)</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>2024 Cure Molecules Private Limited. All rights reserved.</p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Quality Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp -->
    <a href="#" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Antigravity: AOS Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: false,
            mirror: true,
            offset: 100
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const logoLink = document.querySelector('.logo-container');
            if (logoLink) {
                let clickCount = 0;
                let clickTimer;
                logoLink.addEventListener('click', (e) => {
                    e.preventDefault();
                    clickCount++;
                    clearTimeout(clickTimer);
                    if (clickCount === 3) {
                        window.location.href = "{{ route('admin.login') }}";
                    } else {
                        clickTimer = setTimeout(() => {
                             window.location.href = logoLink.getAttribute('href');
                             clickCount = 0;
                        }, 500);
                    }
                });
            }
        });
    </script>

    @yield('scripts')
</body>
</html>

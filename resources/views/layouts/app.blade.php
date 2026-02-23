<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'DevSeas Global') }} - @yield('title', 'High-Purity Pharmaceutical APIs & Excipients')</title>
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
                <img src="{{ asset('assets/images/DEVSEAS logo.png') }}" alt="DevSeas Global" class="site-logo">
            </a>

            <div class="menu-toggle" id="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>

            <ul class="nav-menu">
                <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" onclick="toggleDropdown(event, this)">Products <i class="fas fa-chevron-down" style="font-size: 0.7em;"></i></a>
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
                    <a href="{{ url('/services') }}" onclick="toggleDropdown(event, this)">Services <i class="fas fa-chevron-down" style="font-size: 0.7em;"></i></a>
                    <div class="dropdown-menu">
                        <a href="{{ url('/services') }}" class="dropdown-item">Chemical Trading</a>
                        <a href="{{ url('/quality') }}" class="dropdown-item">Quality Assurance</a>
                        <a href="{{ url('/logistics') }}" class="dropdown-item">Global Logistics</a>
                    </div>
                </li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
                <li><a href="{{ route('admin.login') }}" class="nav-login-btn">Login <i class="fas fa-sign-in-alt"></i></a></li>
            </ul>

            
        </div>
    </header>



    @yield('content')

    <!-- Enhanced Footer -->
    <footer class="main-footer" data-aos="fade-up">
        <div class="container">
            <div class="footer-top">
                <div class="footer-logo-col">
                    <div class="logo-container" style="background: transparent; color: white; padding: 0;">
                        <img src="{{ asset('assets/images/DEVSEAS logo.png') }}" alt="DevSeas" style="height:40px; width:auto;">

                    </div>
                    <p>We are committed to empowering businesses worldwide by offering premium export solutions tailored to their unique needs. With extensive experience and a profound understanding of international markets, we take pride in delivering exceptional service, unmatched reliability, and outstanding value.</p>
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
                            <span>FF-16 Kanha Luxuria, Savita Hospital Road, Parivar Char Rasta, Vadodara, Gujarat 390025</span>
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <span>
                                <a href="tel:+4915560547524" style="color: inherit; text-decoration: none;">+49 15560 547524</a>, 
                                <a href="tel:+916352322122" style="color: inherit; text-decoration: none;">+91 63523 22122</a>
                            </span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>info@devseasglobal.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom" style="flex-direction: column; gap: 15px;">
                <div style="display: flex; justify-content: space-between; width: 100%; align-items: center; flex-wrap: wrap; gap: 10px;">
                    <p style="margin: 0;">&copy; 2026 DevSeas Global. All rights reserved.</p>
                    <div class="footer-bottom-links">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                        <a href="#">Quality Policy</a>
                    </div>
                </div>
                <div class="powered-by" style="display: flex; align-items: center; gap: 10px; font-size: 0.9em; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 10px; width: 100%; justify-content: center;">
                    <span style="color: #cbd5e1;">Powered by TejasKP AI Software</span>
                    <a href="https://tejaskp.in/login" target="_blank" style="text-decoration: none;">
                        <img src="{{ asset('assets/images/tejaskp_logo.png') }}" alt="TejasKP AI Software" style="height: 25px; vertical-align: middle; filter: drop-shadow(0 0 2px rgba(255,255,255,0.3));">
                    </a>
                </div>
            </div>
        </div>
    </footer>

    

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
            // Mobile Menu Toggle
            const menuToggle = document.getElementById('mobile-menu');
            const navMenu = document.querySelector('.nav-menu');

            if (menuToggle && navMenu) {
                menuToggle.addEventListener('click', () => {
                    navMenu.classList.toggle('active');
                    const icon = menuToggle.querySelector('i');
                    if (navMenu.classList.contains('active')) {
                        icon.classList.remove('fa-bars');
                        icon.classList.add('fa-times');
                    } else {
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                });
            }
        });

        // Mobile Dropdown Toggle (Global function called by onclick)
        function toggleDropdown(e, link) {
            if (window.innerWidth <= 992) {
                const parent = link.parentElement;
                const dropdown = parent.querySelector('.dropdown-menu');
                
                // Only prevent navigation and show dropdown if a dropdown menu exists
                if (dropdown) {
                    e.preventDefault();
                    parent.classList.toggle('active');

                    // Close other dropdowns
                    document.querySelectorAll('.nav-item').forEach(item => {
                        if (item !== parent) item.classList.remove('active');
                    });
                }
            }
        }
    </script>

    @yield('scripts')
</body>
</html>




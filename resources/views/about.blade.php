@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <!-- Antigravity: AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <div class="page-header">
        <div class="container">
            <h1 data-aos="fade-down">About Cure Molecules</h1>
            <p data-aos="fade-up" data-aos-delay="200">Driving innovation in pharmaceutical manufacturing since 2010.</p>
        </div>
    </div>

    <!-- Section 1: Who We Are -->
    <section class="about-section">
        <div class="container">
            <div class="about-grid">
                <div class="about-text-col" data-aos="fade-right">
                    <h2 class="section-title">Who We Are</h2>
                    <p>With over a decade of expertise, <strong>Cure Molecules Pvt. Ltd.</strong> has evolved into a leading and trusted manufacturer of high-quality excipients and specialty cosmetic ingredients. What began as a small, determined venture has now grown into a dynamic organization recognized for its reliability, innovation, and uncompromising commitment to quality.</p>
                    <p>Today, <strong>Cure Molecules</strong> proudly delivers a wide portfolio of premium-grade products, including Aluminium Hydroxide Paste & Gel, Magnesium Hydroxide, Dextrose Monohydrate, Dextrose Anhydrous, Potassium Chloride, Sodium Chloride, Sodium Citrate, Potassium Citrate, Zinc Sulphate, and several other customized materials tailored to diverse industry needs.</p>
                    <p>Our products are available in <strong>IP, BP, USP grades</strong>, and we also manufacture EP & JP grades on request — offering complete flexibility for global pharmaceutical, nutraceutical, food, and cosmetic manufacturers.</p>
                    
                    <div class="about-stats-row">
                         <div class="stat-item">
                            <span class="stat-num">15+</span>
                            <span class="stat-lbl">Years</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-num">50+</span>
                            <span class="stat-lbl">Products</span>
                        </div>
                         <div class="stat-item">
                            <span class="stat-num">20+</span>
                            <span class="stat-lbl">Countries</span>
                        </div>
                    </div>

                </div>
                <div class="about-image-col" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Laboratory" class="about-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Mission & Vision -->
    <section class="mission-section">
        <div class="container">
            <div class="mission-grid">
                <div class="mission-card" data-aos="flip-left" data-aos-delay="100">
                    <div class="mission-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>To become a globally preferred partner for high-purity excipients and specialty ingredients, driven by integrity, innovation, and continuous improvement.</p>
                </div>
                <div class="mission-card" data-aos="flip-left" data-aos-delay="200">
                    <div class="mission-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>To deliver world-class products that enhance the quality and performance of formulations across industries — while building long-term partnerships founded on trust, transparency, and excellence.</p>
                </div>
                 <div class="mission-card" data-aos="flip-left" data-aos-delay="300">
                    <div class="mission-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Our Values</h3>
                    <p>We believe in precision, purity, and performance. Every process is driven by advanced technology and strict adherence to global quality standards.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: What Makes Us Different -->
    <section class="why-us-section">
        <div class="container">
            <h2 class="section-title text-center" data-aos="fade-up">What Makes Us Different</h2>
            <div class="features-grid">
                <div class="feature-box" data-aos="zoom-in" data-aos-delay="100">
                    <i class="fas fa-certificate feature-icon"></i>
                    <h4>Trusted Excellence</h4>
                    <p>Over 10 years of trusted manufacturing excellence in the pharma industry.</p>
                </div>
                <div class="feature-box" data-aos="zoom-in" data-aos-delay="200">
                   <i class="fas fa-flask feature-icon"></i>
                    <h4>GMP Compliant</h4>
                    <p>GMP-compliant production with rigorous QC & QA at every stage.</p>
                </div>
                <div class="feature-box" data-aos="zoom-in" data-aos-delay="300">
                    <i class="fas fa-sliders-h feature-icon"></i>
                    <h4>Customization</h4>
                    <p>Customized grades, packaging, and documentation for client-specific needs.</p>
                </div>
                <div class="feature-box" data-aos="zoom-in" data-aos-delay="400">
                    <i class="fas fa-globe-americas feature-icon"></i>
                    <h4>Global Logistics</h4>
                    <p>Robust global logistics ensuring safe, timely, and reliable delivery.</p>
                </div>
                 <div class="feature-box" data-aos="zoom-in" data-aos-delay="500">
                    <i class="fas fa-headset feature-icon"></i>
                    <h4>Customer First</h4>
                    <p>A customer-first approach backed by technical expertise and strong service.</p>
                </div>
                 <div class="feature-box" data-aos="zoom-in" data-aos-delay="600">
                    <i class="fas fa-leaf feature-icon"></i>
                    <h4>Sustainability</h4>
                    <p>Committed to sustainable practices and environmentally responsible manufacturing.</p>
                </div>
            </div>
        </div>
    </section>

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
@endsection

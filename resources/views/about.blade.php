@extends('layouts.app')

@section('title', 'About Us')

@section('content')

    <div class="page-header">
        <div class="container">
            <h1 data-aos="fade-down">About DevSeas Global</h1>
            <p data-aos="fade-up" data-aos-delay="200">Driving innovation in pharmaceutical manufacturing since 2010.</p>
        </div>
    </div>

    <!-- Section 1: Who We Are -->
    <section class="about-section">
        <div class="container">
            <div class="about-grid">
                <div class="about-text-col" data-aos="fade-right">
                    <h2 class="section-title">Connecting Global Markets with Expertise and Trust</h2>
                    <p>At <strong>Devseas Global</strong>, we are committed to empowering businesses worldwide by offering premium export solutions tailored to their unique needs. With extensive experience and a profound understanding of international markets, we take pride in delivering exceptional service, unmatched reliability, and outstanding value.</p>
                    <p>Our team of seasoned experts excels in sourcing, logistics, and compliance, ensuring that every product reaches its destination efficiently and adheres to global standards. From meticulous documentation to streamlined freight management, we handle every detail, making the export process smooth and worry-free for our clients.</p>
                    
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
                    <img src="{{ asset('assets/images/Boatimg.jpg') }}" alt="Cargo Ship at Port" class="about-img">
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
                    <p>To connect global markets by delivering reliable, efficient, and high-quality export solutions. We strive to empower businesses worldwide through exceptional service, ethical practices, and a commitment to excellence, fostering long-lasting partnerships built on trust and mutual growth.</p>
                </div>
                <div class="mission-card" data-aos="flip-left" data-aos-delay="200">
                    <div class="mission-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>To be a global leader in export solutions, renowned for our innovation, integrity, and unwavering dedication to customer success. We aim to bridge international markets, creating a world where businesses thrive through seamless trade and sustainable partnerships.</p>
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

@endsection

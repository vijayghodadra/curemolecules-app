@extends('layouts.app')

@section('title', 'Chemical Trading - CureMolecules')

@section('content')
<div class="page-header">
    <div class="container">
        <h1 data-aos="fade-down">Chemical Trading</h1>
        <p data-aos="fade-up" data-aos-delay="200">Cure Molecules Pvt. Ltd. offers comprehensive chemical trading services, connecting global suppliers with customers worldwide. Our extensive network ensures reliable supply chains for industrial chemicals, solvents, acids, and specialty compounds.</p>
    </div>
</div>

<!-- Section 1: Our Trading Services -->
<section class="trading-services-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Our Trading Services</h2>
        </div>
        <div class="trading-grid">
            <!-- Card 1 -->
            <div class="trading-card" data-aos="fade-up" data-aos-delay="100">
                <div class="trading-icon">
                    <i class="fas fa-globe-americas"></i>
                </div>
                <h3>Global Sourcing</h3>
                <p>Access to worldwide suppliers and manufacturers for competitive pricing and reliable supply chains</p>
            </div>
            <!-- Card 2 -->
            <div class="trading-card" data-aos="fade-up" data-aos-delay="200">
                <div class="trading-icon">
                    <i class="fas fa-check-square"></i>
                </div>
                <h3>Quality Verification</h3>
                <p>Rigorous quality checks and certifications to ensure all traded chemicals meet industry standards</p>
            </div>
            <!-- Card 3 -->
            <div class="trading-card" data-aos="fade-up" data-aos-delay="300">
                <div class="trading-icon">
                    <i class="fas fa-shipping-fast"></i>
                </div>
                <h3>Logistics Management</h3>
                <p>End-to-end logistics solutions including packaging, shipping, and customs clearance</p>
            </div>
            <!-- Card 4 -->
            <div class="trading-card" data-aos="fade-up" data-aos-delay="400">
                <div class="trading-icon">
                    <i class="fas fa-file-contract"></i>
                </div>
                <h3>Regulatory Compliance</h3>
                <p>Full compliance with international chemical trading regulations and safety standards</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Chemical Trading Portfolio -->
<section class="portfolio-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Chemical Trading Portfolio</h2>
        </div>
        <div class="portfolio-grid">
            <!-- Item 1 -->
            <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="100">
                <h3>Aluminium chloride</h3>
                <span class="portfolio-type">Industrial Chemical</span>
                <div class="portfolio-apps">
                    <span class="p-label">Applications:</span>
                    <span class="p-tag">Water Treatment</span>
                    <span class="p-tag">Pharmaceuticals</span>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="150">
                <h3>Caustic soda lye</h3>
                <span class="portfolio-type">Industrial Chemical</span>
                <div class="portfolio-apps">
                    <span class="p-label">Applications:</span>
                    <span class="p-tag">Manufacturing</span>
                    <span class="p-tag">Cleaning</span>
                </div>
            </div>
            <!-- Item 3 -->
            <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="200">
                <h3>Caustic soda flakes</h3>
                <span class="portfolio-type">Industrial Chemical</span>
                <div class="portfolio-apps">
                    <span class="p-label">Applications:</span>
                    <span class="p-tag">Paper Industry</span>
                    <span class="p-tag">Textiles</span>
                </div>
            </div>
            <!-- Item 4 -->
            <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="250">
                <h3>Chloroform</h3>
                <span class="portfolio-type">Solvent</span>
                <div class="portfolio-apps">
                    <span class="p-label">Applications:</span>
                    <span class="p-tag">Laboratory</span>
                    <span class="p-tag">Industrial</span>
                </div>
            </div>
            <!-- Item 5 -->
            <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="300">
                <h3>Chlorine Gas</h3>
                <span class="portfolio-type">Industrial Gas</span>
                <div class="portfolio-apps">
                    <span class="p-label">Applications:</span>
                    <span class="p-tag">Water Treatment</span>
                    <span class="p-tag">Disinfection</span>
                </div>
            </div>
            <!-- Item 6 -->
            <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="350">
                <h3>Hydrazine Hydrate</h3>
                <span class="portfolio-type">Chemical Intermediate</span>
                <div class="portfolio-apps">
                    <span class="p-label">Applications:</span>
                    <span class="p-tag">Pharmaceuticals</span>
                    <span class="p-tag">Agriculture</span>
                </div>
            </div>
            <!-- Item 7 -->
            <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="400">
                <h3>Hydrochloric Acid (HCL)</h3>
                <span class="portfolio-type">Acid</span>
                <div class="portfolio-apps">
                    <span class="p-label">Applications:</span>
                    <span class="p-tag">Metal Processing</span>
                    <span class="p-tag">pH Control</span>
                </div>
            </div>
            <!-- Item 8 -->
            <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="450">
                <h3>Hydrogen Gas</h3>
                <span class="portfolio-type">Industrial Gas</span>
                <div class="portfolio-apps">
                    <span class="p-label">Applications:</span>
                    <span class="p-tag">Hydrogenation</span>
                    <span class="p-tag">Fuel Cells</span>
                </div>
            </div>
            <!-- Item 9 -->
            <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="500">
                <h3>MDC</h3>
                <span class="portfolio-type">Solvent</span>
                <div class="portfolio-apps">
                    <span class="p-label">Applications:</span>
                    <span class="p-tag">Pharmaceuticals</span>
                    <span class="p-tag">Electronics</span>
                </div>
            </div>
            <!-- Item 10 -->
            <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="550">
                <h3>Poly Aluminium Chloride</h3>
                <span class="portfolio-type">Coagulant</span>
                <div class="portfolio-apps">
                    <span class="p-label">Applications:</span>
                    <span class="p-tag">Water Treatment</span>
                    <span class="p-tag">Paper Industry</span>
                </div>
            </div>
            <!-- Item 11 -->
            <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="600">
                <h3>Sodium Hypochlorite</h3>
                <span class="portfolio-type">Disinfectant</span>
                <div class="portfolio-apps">
                    <span class="p-label">Applications:</span>
                    <span class="p-tag">Water Treatment</span>
                    <span class="p-tag">Sanitization</span>
                </div>
            </div>
            <!-- Item 12 -->
            <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="650">
                <h3>Sulfuric Acid</h3>
                <span class="portfolio-type">Acid</span>
                <div class="portfolio-apps">
                    <span class="p-label">Applications:</span>
                    <span class="p-tag">Battery Manufacturing</span>
                    <span class="p-tag">Metal Processing</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

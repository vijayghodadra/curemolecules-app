@extends('layouts.app')

@section('title', 'Global Logistics - CureMolecules')

@section('content')
<div class="page-header">
    <div class="container">
        <h1 data-aos="fade-down">Global Logistics & Distribution</h1>
        <p data-aos="fade-up" data-aos-delay="200">It includes planning, transport, customs compliance, freight handling, warehousing, and delivery so that goods reach customers or markets worldwide on time and in good condition. In practice this means coordinating the flow of products from manufacturers or suppliers through shipping networks and storage points to final destinations while managing documentation, compliance, and cost optimization.</p>
    </div>
</div>

<!-- Reliable Worldwide Reach Banner -->
<section class="logistics-banner-section">
    <div class="container">
        <div class="logistics-banner" data-aos="zoom-in">
            <h2>Reliable Worldwide Reach</h2>
            <p>We supply products across India and export to global markets through partnerships with certified logistics providers. Whether the requirement is IP, BP, USP, EP, JP or FCC grade, we ensure seamless delivery tailored to customer needs.</p>
        </div>
    </div>
</section>

<!-- Why Our Logistics Stand Out -->
<section class="logistics-features-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Why Our Logistics Stand Out</h2>
        </div>
        <div class="logistics-grid">
            <!-- 1. Secure Packaging -->
            <div class="logistics-card" data-aos="fade-up" data-aos-delay="100">
                <div class="logistics-icon"><i class="fas fa-box-open"></i></div>
                <h3>Secure & Compliant Packaging</h3>
                <p>All materials are packed using industry-standard, contamination-free packaging suitable for sensitive excipients and cosmetic ingredients</p>
            </div>
            <!-- 2. Temperature Safety -->
            <div class="logistics-card" data-aos="fade-up" data-aos-delay="200">
                <div class="logistics-icon"><i class="fas fa-temperature-low"></i></div>
                <h3>Temperature & Safety-Controlled Handling</h3>
                <p>For products requiring special care, we ensure controlled environments during storage and transit</p>
            </div>
            <!-- 3. Fast Dispatch -->
            <div class="logistics-card" data-aos="fade-up" data-aos-delay="300">
                <div class="logistics-icon"><i class="fas fa-shipping-fast"></i></div>
                <h3>Fast Dispatch & On-Time Delivery</h3>
                <p>Our optimized supply chain, ready inventory, and efficient coordination help reduce lead times and ensure punctual delivery worldwide</p>
            </div>

            <!-- 5. Flexible Shipping -->
            <div class="logistics-card" data-aos="fade-up" data-aos-delay="500">
                <div class="logistics-icon"><i class="fas fa-truck-loading"></i></div>
                <h3>Flexible Shipping Options</h3>
                <p>Air freight, sea freight, courier, or customized bulk shipment solutions — our logistics team adapts to your preferred mode and timeline</p>
            </div>
            <!-- 6. Tracking -->
            <div class="logistics-card" data-aos="fade-up" data-aos-delay="600">
                <div class="logistics-icon"><i class="fas fa-map-marker-alt"></i></div>
                <h3>Tracking & Transparency</h3>
                <p>Customers receive shipment updates and documentation at every stage, ensuring clarity and confidence throughout the process</p>
            </div>
        </div>
    </div>
</section>

<!-- Shipping Options -->
<section class="shipping-options-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <h2>Shipping Options</h2>
        </div>
        <div class="shipping-grid">
            <div class="shipping-card" data-aos="flip-left" data-aos-delay="100">
                <div class="shipping-icon"><i class="fas fa-plane"></i></div>
                <h3>Air Freight</h3>
                <div class="shipping-badge">3-7 days</div>
                <p>Urgent orders, small quantities</p>
            </div>
            <div class="shipping-card" data-aos="flip-left" data-aos-delay="200">
                <div class="shipping-icon"><i class="fas fa-ship"></i></div>
                <h3>Sea Freight</h3>
                <div class="shipping-badge">15-45 days</div>
                <p>Bulk orders, cost-effective shipping</p>
            </div>
            <div class="shipping-card" data-aos="flip-left" data-aos-delay="300">
                <div class="shipping-icon"><i class="fas fa-shipping-fast"></i></div>
                <h3>Express Courier</h3>
                <div class="shipping-badge">1-3 days</div>
                <p>Samples, documents, small packages</p>
            </div>
            <div class="shipping-card" data-aos="flip-left" data-aos-delay="400">
                <div class="shipping-icon"><i class="fas fa-truck"></i></div>
                <h3>Road Transport</h3>
                <div class="shipping-badge">1-10 days</div>
                <p>Regional deliveries, flexible routing</p>
            </div>
        </div>
    </div>
</section>

<!-- Distribution Promise Banner -->
<section class="promise-section">
    <div class="container">
        <div class="promise-banner" data-aos="fade-up">
            <h2>Our Distribution Promise</h2>
            <p>Our team of seasoned experts excels in sourcing, logistics, and compliance, ensuring that every product reaches its destination efficiently and adheres to global standards. From meticulous documentation to streamlined freight management, we handle every detail, making the export process smooth and worry-free for our clients.</p>
        </div>
    </div>
</section>
@endsection

@extends('layouts.app')

@section('title', 'Global Logistics - CureMolecules')

@section('content')
<div class="page-header">
    <div class="container">
        <h1 data-aos="fade-down">Global Logistics & Distribution</h1>
        <p data-aos="fade-up" data-aos-delay="200">
            At Cure Molecules Pvt. Ltd., we understand that timely, safe, and efficient delivery is just as important as product quality. With a strong global logistics network and streamlined distribution systems, we ensure that our high-purity excipients and cosmetic ingredients reach customers across the world with speed, safety, and reliability.
            <br><br>
            Our logistics team is equipped to manage domestic as well as international shipments with full compliance to regulatory, packaging, and transportation standards for pharmaceutical, cosmetic, and food-grade materials.
        </p>
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
            <!-- 4. Documentation -->
            <div class="logistics-card" data-aos="fade-up" data-aos-delay="400">
                <div class="logistics-icon"><i class="fas fa-file-contract"></i></div>
                <h3>Complete Export Documentation</h3>
                <p>We offer full support including MSDS, Technical Data Sheets, Packing List, Invoice, COO, and Regulatory Compliance Papers for smooth international shipments</p>
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
            <p>We are committed to delivering your products safely, efficiently, and on time — anywhere in the world. With robust planning, world-class logistics partners, and a dedicated customer support team, Cure Molecules Pvt. Ltd. ensures smooth global distribution for every order.</p>
        </div>
    </div>
</section>
@endsection

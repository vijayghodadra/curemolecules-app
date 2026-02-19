@extends('layouts.app')

@section('title', 'Pharmaceutical APIs & Excipients')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <h1>CureMolecules – High-Purity<br>Pharmaceutical APIs & Excipients</h1>
                <p class="company-name-hero">Cure Molecules Private Limited – Your Trusted Manufacturing Partner</p>

                <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                    <p>
                        <i class="fas fa-check-circle" style="color: var(--primary);"></i>
                        <span class="highlight">CureMolecules specializes in IP/BP/USP grade</span> pharmaceutical APIs,
                        antacids, electrolytes, and excipients. Cure Molecules delivers premium quality chemicals for
                        pharmaceutical, nutraceutical, and food industries worldwide.
                    </p>
                </div>

                <div class="badges" data-aos="fade-up" data-aos-delay="400">
                    <div class="badge badge-ip"><i class="fas fa-check"></i> IP Grade</div>
                    <div class="badge badge-bp"><i class="fas fa-check"></i> BP Grade</div>
                    <div class="badge badge-usp"><i class="fas fa-check"></i> USP Grade</div>
                </div>

                <div class="cta-buttons" data-aos="fade-up" data-aos-delay="600">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">View Products</a>
                    <a href="{{ url('/contact') }}" class="btn btn-outline">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Categories Section -->
    <section class="categories-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2>Product Categories</h2>
                <p>Explore our comprehensive range of chemical and pharmaceutical products across multiple categories</p>
            </div>

            <div class="category-grid">
                <!-- Card 1: Antacids -->
                <div class="category-card card-antacids" data-aos="fade-up" data-aos-delay="100">
                    <div class="cat-icon"><i class="fas fa-capsules"></i></div>
                    <h3>Antacids & Laxatives</h3>
                    <p>Dried aluminium hydroxide gel, magnesium hydroxide, magnesium trisilicate and carbonate compounds</p>
                    <a href="{{ route('products.index') }}" class="cat-badge">5+ Products</a>
                </div>

                <!-- Card 2: Food & Pharma -->
                <div class="category-card card-food" data-aos="fade-up" data-aos-delay="200">
                    <div class="cat-icon"><i class="fas fa-jar"></i></div>
                    <h3>Food & Beverages & Pharmaceuticals</h3>
                    <p>Citric acid, dextrose, sodium chloride, potassium chloride, and citrate compounds</p>
                    <a href="{{ route('products.index') }}" class="cat-badge">8+ Products</a>
                </div>

                <!-- Card 3: ORS -->
                <div class="category-card card-ors" data-aos="fade-up" data-aos-delay="300">
                    <div class="cat-icon"><i class="fas fa-syringe"></i></div>
                    <h3>ORS & Injectables</h3>
                    <p>Dextrose, potassium chloride, sodium chloride, and citrate compounds for medical solutions</p>
                    <a href="{{ route('products.index') }}" class="cat-badge">6+ Products</a>
                </div>

                <!-- Card 4: Pharma & Nutra -->
                <div class="category-card card-pharma" data-aos="fade-up" data-aos-delay="400">
                    <div class="cat-icon"><i class="fas fa-dna"></i></div>
                    <h3>Pharmaceuticals & Nutraceuticals & Cosmetics</h3>
                    <p>Aluminium magnesium silicate, magnesium compounds, zinc sulphates, and specialized ingredients</p>
                    <a href="{{ route('products.index') }}" class="cat-badge">10+ Products</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="featured-section">
        <div class="container">
            <div class="section-header">
                <h2>Featured Products</h2>
                <p>Discover our most popular and high-demand chemical and pharmaceutical products</p>
            </div>

            <div class="featured-grid">
                @forelse($featuredProducts as $product)
                <div class="featured-card">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                        <span class="stock-status">In Stock</span>
                        <span class="grade-badge">IP/BP/USP</span>
                    </div>
                    <div style="text-align: center; margin-bottom: 20px;">
                        @if($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}" 
                                 style="border-radius: 8px; max-height: 150px; width: auto;" alt="{{ $product->name }}">
                        @else
                            <img src="https://img.icons8.com/color/96/pill.png" 
                                 style="border-radius: 8px;" alt="Product Image">
                        @endif
                    </div>

                    <h3 class="f-title">{{ $product->name }}</h3>
                    <div class="f-meta">
                        <span><strong>CAS:</strong> {{ $product->cas_number ?? 'N/A' }}</span>
                        <span><strong>Category:</strong> {{ $product->category->name ?? 'Uncategorized' }}</span>
                    </div>
                    <p class="f-desc">{{ Str::limit($product->description, 100) }}</p>

                    <div class="app-tags">
                        @if($product->application)
                            @foreach(explode(',', $product->application) as $tag)
                                <span class="app-tag">{{ trim($tag) }}</span>
                            @endforeach
                        @endif
                    </div>

                    <a href="{{ url('/contact') }}" class="btn btn-primary btn-full">Request Quote</a>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>No featured products available yet.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Quality & Certifications Section -->
    <section class="cert-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2>Quality & Certifications</h2>
                <p>At Cure Molecules Pvt. Ltd., quality is the foundation of our manufacturing excellence.</p>
            </div>

            <p class="cert-text" data-aos="fade-up" data-aos-delay="100">
                As a trusted producer of high-purity excipients and cosmetic ingredients — including Dried Aluminium
                Hydroxide, Magnesium Hydroxide, Sodium Chloride, and many more — we ensure that every product reflects
                our commitment to safety, consistency, and global compliance. We manufacture products in IP, BP, USP
                grades, and we also supply EP & JP & Food grades upon customer requirement.
            </p>

            <div class="cert-grid">
                <!-- ISO 9001 -->
                <div class="cert-card cert-iso9001" data-aos="fade-up" data-aos-delay="200">
                    <div class="cert-icon"><i class="fas fa-trophy"></i></div>
                    <h3>ISO 9001:2015</h3>
                    <p>Quality Management System</p>
                    <span class="valid-pill">Valid until 2025</span>
                </div>

                <!-- ISO 14001 -->
                <div class="cert-card cert-iso14001" data-aos="fade-up" data-aos-delay="300">
                    <div class="cert-icon"><i class="fas fa-seedling"></i></div>
                    <h3>ISO 14001:2015</h3>
                    <p>Environmental Management</p>
                    <span class="valid-pill">Valid until 2025</span>
                </div>

                <!-- GMP -->
                <div class="cert-card cert-gmp" data-aos="fade-up" data-aos-delay="400">
                    <div class="cert-icon"><i class="fas fa-check-square"></i></div>
                    <h3>GMP Certified</h3>
                    <p>Good Manufacturing Practice</p>
                    <span class="valid-pill">Valid until 2024</span>
                </div>

                <!-- Halal -->
                <div class="cert-card cert-halal" data-aos="fade-up" data-aos-delay="500">
                    <div class="cert-icon"><i class="fas fa-moon"></i></div>
                    <h3>Halal Certified</h3>
                    <p>Halal Food Standards</p>
                    <span class="valid-pill">Valid until 2024</span>
                </div>

                 <!-- FDA -->
                 <div class="cert-card cert-fda" data-aos="fade-up" data-aos-delay="600">
                    <div class="cert-icon"><i class="fas fa-university"></i></div>
                    <h3>FDA Registered</h3>
                    <p>Food & Drug Administration</p>
                    <span class="valid-pill">Valid until 2024</span>
                </div>

                <!-- Kosher -->
                <div class="cert-card cert-kosher" data-aos="fade-up" data-aos-delay="700">
                    <div class="cert-icon"><i class="fas fa-star-of-david"></i></div>
                    <h3>KOSHER Certified</h3>
                    <p>Kosher Food Standards</p>
                    <span class="valid-pill">Valid until 2024</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Quality Standards & Commitment Section -->
    <section class="quality-commit-section">
        <div class="container">
            <!-- Standards Box -->
            <div class="quality-container" data-aos="fade-right">
                <h2 class="quality-title">Our Quality Standards</h2>
                <div class="quality-grid">
                    <div class="quality-item">
                        <i class="fas fa-microscope q-icon q-icon-microscope"></i>
                        <h4>Premium Raw Material Selection</h4>
                        <p>We source only from approved and certified suppliers to maintain unmatched purity and
                            performance</p>
                    </div>
                    <div class="quality-item">
                        <i class="fas fa-industry q-icon q-icon-factory"></i>
                        <h4>GMP-Compliant Production</h4>
                        <p>All manufacturing processes follow strict Good Manufacturing Practices to guarantee
                            uniformity</p>
                    </div>
                    <div class="quality-item">
                        <i class="fas fa-flask q-icon q-icon-flask"></i>
                        <h4>Advanced QC Testing</h4>
                        <p>Every batch undergoes rigorous physical, chemical, and microbiological analysis using
                            validated methods</p>
                    </div>
                    <div class="quality-item">
                        <i class="fas fa-clipboard-check q-icon q-icon-clipboard"></i>
                        <h4>Full Traceability & Documentation</h4>
                        <p>Each product comes with a complete set of MSDS, technical data sheets, and regulatory
                            documentation</p>
                    </div>
                    <div class="quality-item">
                        <i class="fas fa-chart-line q-icon q-icon-chart"></i>
                        <h4>Culture of Continuous Improvement</h4>
                        <p>Regular audits, training, and process enhancements help us maintain consistent
                            global-standard quality</p>
                    </div>
                </div>
            </div>

            <!-- Commitment Banner -->
            <div class="commitment-banner" data-aos="fade-left">
                <h3 class="commitment-title">Our Commitment</h3>
                <p class="commitment-text">
                    We deliver safe, compliant, and high-performance ingredients designed to elevate the quality of
                    pharmaceutical, nutraceutical, cosmetic, and food formulations. With precision-driven manufacturing
                    and a quality-first mindset, Cure Molecules Pvt. Ltd. is your dependable partner for superior
                    excipients and cosmetic ingredients.
                </p>
            </div>
        </div>
    </section>

    <!-- Stats Row Section -->
    <section class="stats-row-section" data-aos="fade-up">
        <div class="container">
            <div class="stats-flex">
                <div class="stat-item-row" data-aos="zoom-in" data-aos-delay="100">
                    <span class="stat-value">IP/BP/USP</span>
                    <span class="stat-desc">Standard Grades</span>
                </div>
                <div class="stat-item-row" data-aos="zoom-in" data-aos-delay="200">
                    <span class="stat-value">EP/JP/FCC</span>
                    <span class="stat-desc">Custom Grades</span>
                </div>
                <div class="stat-item-row" data-aos="zoom-in" data-aos-delay="300">
                    <span class="stat-value">99.8%</span>
                    <span class="stat-desc">Quality Pass Rate</span>
                </div>
                <div class="stat-item-row" data-aos="zoom-in" data-aos-delay="400">
                    <span class="stat-value">24h</span>
                    <span class="stat-desc">Testing Turnaround</span>
                </div>
                <div class="stat-item-row" data-aos="zoom-in" data-aos-delay="500">
                    <span class="stat-value">Zero</span>
                    <span class="stat-desc">Quality Incidents</span>
                </div>
            </div>
        </div>
    </section>
@endsection

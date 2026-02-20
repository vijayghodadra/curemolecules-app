@extends('layouts.app')

@section('title', 'Pharmaceutical APIs & Excipients')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <h1>DevSeas Global</h1>
                <p class="company-name-hero">"Global Reach, Diverse Products"</p>
                <p class="company-name-hero" style="font-style: italic;">"Delivering Quality Across Continents."</p>

                <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                    <p>
                        <i class="fas fa-check-circle" style="color: var(--primary);"></i>
                        <span class="highlight">DevSeas Global specializes in premium export solutions</span> — connecting international markets with reliable, efficient, and high-quality products tailored to every business need.
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
                <!-- Card 1: Agri Commodities -->
                <div class="category-card card-antacids" data-aos="fade-up" data-aos-delay="100">
                    <div class="cat-icon"><i class="fas fa-seedling"></i></div>
                    <h3>Agri Commodities</h3>
                    <p>We specializes in exporting top-quality agri commodities, including grains, pulses, and spices. Sourced from reliable farms, our products guarantee exceptional quality and sustainability for various markets.</p>
                    <a href="{{ route('products.index') }}" class="cat-badge">View Products</a>
                </div>

                <!-- Card 2: Plastic Packaging -->
                <div class="category-card card-food" data-aos="fade-up" data-aos-delay="200">
                    <div class="cat-icon"><i class="fas fa-box"></i></div>
                    <h3>Plastic Packaging</h3>
                    <p>We offers high-quality plastic packaging solutions designed for durability, versatility, and sustainability. Our range includes bags, films, and containers tailored to meet diverse industrial and consumer needs.</p>
                    <a href="{{ route('products.index') }}" class="cat-badge">View Products</a>
                </div>

                <!-- Card 3: Chemical -->
                <div class="category-card card-ors" data-aos="fade-up" data-aos-delay="300">
                    <div class="cat-icon"><i class="fas fa-flask"></i></div>
                    <h3>Chemical</h3>
                    <p>Devseas Global offers a wide range of high-quality chemical products tailored for various industries, including agriculture, manufacturing, and pharmaceuticals, ensuring safety, efficacy, and reliability.</p>
                    <a href="{{ route('products.index') }}" class="cat-badge">View Products</a>
                </div>

                <!-- Card 4: Packaging -->
                <div class="category-card card-pharma" data-aos="fade-up" data-aos-delay="400">
                    <div class="cat-icon"><i class="fas fa-utensils"></i></div>
                    <h3>Packaging</h3>
                    <p>Specializes in high-quality disposable fast food paper products, including trays, bags, and wrappers. Our eco-friendly solutions cater to the fast-paced food industry, ensuring food safety and ease of use.</p>
                    <a href="{{ route('products.index') }}" class="cat-badge">View Products</a>
                </div>

                <!-- Card 5: Medicare -->
                <div class="category-card card-antacids" data-aos="fade-up" data-aos-delay="500">
                    <div class="cat-icon"><i class="fas fa-heartbeat"></i></div>
                    <h3>Medicare</h3>
                    <p>Devseas Global provides a comprehensive range of medicare products, prioritizing safety, reliability, and quality. Our solutions cater to diverse healthcare needs, ensuring efficient support for medical professionals.</p>
                    <a href="{{ route('products.index') }}" class="cat-badge">View Products</a>
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
                            <div style="width:80px; height:80px; border-radius:50%; background:linear-gradient(135deg,#38bdf8,#6366f1); display:inline-flex; align-items:center; justify-content:center; margin:0 auto;">
                                <i class="fas fa-flask" style="font-size:32px; color:#fff;"></i>
                            </div>
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
                <p>At DevSeas Global Pvt. Ltd., quality is the foundation of our manufacturing excellence.</p>
            </div>

            <p class="cert-text" data-aos="fade-up" data-aos-delay="100">
                As a trusted producer of high-purity excipients and cosmetic ingredients — including Dried Aluminium
                Hydroxide, Magnesium Hydroxide, Sodium Chloride, and many more — we ensure that every product reflects
                our commitment to safety, consistency, and global compliance. We manufacture products in IP, BP, USP
                grades, and we also supply EP & JP & Food grades upon customer requirement.
            </p>

            <div class="cert-grid">
                <!-- HACCP -->
                <div class="cert-card cert-iso9001" data-aos="fade-up" data-aos-delay="200">
                    <div class="cert-icon"><i class="fas fa-shield-alt"></i></div>
                    <h3>HACCP</h3>
                    <p>Hazard Analysis Critical Control Point</p>
                    <span class="valid-pill">Certified</span>
                </div>

                <!-- GMP -->
                <div class="cert-card cert-gmp" data-aos="fade-up" data-aos-delay="300">
                    <div class="cert-icon"><i class="fas fa-check-square"></i></div>
                    <h3>GMP Certified</h3>
                    <p>Good Manufacturing Practice</p>
                    <span class="valid-pill">Certified</span>
                </div>

                <!-- ISO 9001:2015 -->
                <div class="cert-card cert-iso14001" data-aos="fade-up" data-aos-delay="400">
                    <div class="cert-icon"><i class="fas fa-trophy"></i></div>
                    <h3>ISO 9001:2015</h3>
                    <p>Quality Management System</p>
                    <span class="valid-pill">Certified</span>
                </div>

                <!-- IEC -->
                <div class="cert-card cert-fda" data-aos="fade-up" data-aos-delay="500">
                    <div class="cert-icon"><i class="fas fa-ship"></i></div>
                    <h3>IEC</h3>
                    <p>Import Export Code</p>
                    <span class="valid-pill">Registered</span>
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

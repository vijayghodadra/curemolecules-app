@extends('layouts.app')

@section('title', 'Our Products')

@section('content')
    <div class="page-header">
        <div class="container">
            <h1>Our Products</h1>
            <p>Explore our comprehensive catalog of high-quality chemicals and pharmaceutical products</p>
        </div>
    </div>

    <div class="container">

        <!-- Filter Section -->
        <div class="products-filter-section" data-aos="fade-up">
            <div class="filter-row">
                <div class="search-group">
                    <label class="filter-label">Search Products</label>
                    <input type="text" id="searchInput" class="search-input" placeholder="Search by name, CAS number, or application...">
                </div>
                <div class="filter-group">
                    <label class="filter-label">Category</label>
                    <select id="categoryFilter" class="filter-select">
                        <option value="all">All Products</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Sort By</label>
                    <select id="sortFilter" class="filter-select">
                        <option value="name-asc">Name (A-Z)</option>
                        <option value="name-desc">Name (Z-A)</option>
                        <option value="newest">Newest First</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Results Info -->
        <div class="results-info" data-aos="fade-up" data-aos-delay="100">
            <span id="resultsCount">Showing {{ $products->count() }} of {{ $products->count() }} products</span>
            <div class="view-options">
                <div class="view-btn active"><i class="fas fa-th-large"></i></div>
                <div class="view-btn"><i class="fas fa-list"></i></div>
            </div>
        </div>

        <!-- Enhanced Product Grid -->
        <div id="productGrid" class="product-grid">
            @forelse($products as $product)
                <div class="product-card-enhanced" 
                     data-category="{{ $product->category->slug ?? 'uncategorized' }}" 
                     data-name="{{ $product->name }}" 
                     data-cas="{{ $product->cas_number }}"
                     data-aos="fade-up" 
                     data-aos-delay="{{ 100 + ($loop->index * 100) }}">
                    
                    <div class="pc-header">
                        <span class="stock-status">In Stock</span>
                        <span class="grade-badge">IP/BP/USP</span>
                    </div>
                    
                    <div class="pc-image-container">
                        @if($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                        @else
                            <img src="https://img.icons8.com/color/96/pill.png" alt="Product Image">
                        @endif
                    </div>

                    <h3 class="pc-title">{{ $product->name }}</h3>
                    
                    <div class="pc-meta">
                        <div><strong>CAS:</strong> {{ $product->cas_number ?? 'N/A' }}</div>
                        <div><strong>Category:</strong> {{ $product->category->name ?? 'Uncategorized' }}</div>
                    </div>

                    <p class="pc-desc">{{ Str::limit($product->description, 100) }}</p>

                    <div class="app-tags">
                        @if($product->application)
                            @foreach(explode(',', $product->application) as $tag)
                                <span class="app-tag">{{ trim($tag) }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div class="pc-footer">
                        <span class="contact-pricing">Contact for pricing</span>
                        <a href="{{ url('/contact') }}" class="btn-full" style="text-decoration: none; text-align: center; display: block;">Request Quote</a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center" data-aos="fade-up">
                    <p>No products found.</p>
                </div>
            @endforelse
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const categoryFilter = document.getElementById('categoryFilter');
            const sortFilter = document.getElementById('sortFilter');
            const productGrid = document.getElementById('productGrid');
            const products = Array.from(document.querySelectorAll('.product-card-enhanced'));
            const resultsCount = document.getElementById('resultsCount');

            // Parse URL parameters for initial category
            const urlParams = new URLSearchParams(window.location.search);
            const initialCategory = urlParams.get('category');
            if (initialCategory) {
                // If the value exists in the dropdown, select it
                const option = categoryFilter.querySelector(`option[value="${initialCategory}"]`);
                if (option) {
                    categoryFilter.value = initialCategory;
                }
            }

            function filterProducts() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedCategory = categoryFilter.value;
                const selectedSort = sortFilter.value;

                let visibleCount = 0;

                products.forEach(product => {
                    const name = (product.dataset.name || '').toLowerCase();
                    const category = product.dataset.category || 'all';
                    const cas = (product.dataset.cas || '').toLowerCase();
                    
                    // Check search term (name or CAS)
                    const matchesSearch = name.includes(searchTerm) || cas.includes(searchTerm);
                    // Check category
                    const matchesCategory = selectedCategory === 'all' || category === selectedCategory;

                    if (matchesSearch && matchesCategory) {
                        product.style.display = 'flex'; // Restore display flex
                        visibleCount++;
                    } else {
                        product.style.display = 'none';
                    }
                });

                // Sort Logic (Basic DOM reordering)
                const visibleProducts = products.filter(p => p.style.display !== 'none');
                visibleProducts.sort((a, b) => {
                    const nameA = (a.dataset.name || '').toLowerCase();
                    const nameB = (b.dataset.name || '').toLowerCase();
                    
                    if (selectedSort === 'name-asc') return nameA.localeCompare(nameB);
                    if (selectedSort === 'name-desc') return nameB.localeCompare(nameA);
                    return 0; 
                });

                // Reset Animation Delays for visible items
                let delayCounter = 0;
                products.forEach(p => {
                    if (p.style.display !== 'none') {
                        // Reset delay to ensure sequential animation
                        p.setAttribute('data-aos-delay', (delayCounter * 100) + 100);
                        p.classList.remove('aos-animate'); // Remove class to re-trigger
                        delayCounter++;
                    }
                });

                products.forEach(p => productGrid.appendChild(p));

                resultsCount.textContent = `Showing ${visibleCount} of ${products.length} products`;
                
                // Refresh AOS to catch new positions
                if (window.AOS) {
                    setTimeout(() => {
                        window.AOS.refresh();
                    }, 100);
                }
            }

            // Event Listeners
            searchInput.addEventListener('input', filterProducts);
            categoryFilter.addEventListener('change', filterProducts);
            sortFilter.addEventListener('change', filterProducts);

            // Initial Filter Run
            filterProducts();
        });
    </script>
@endsection

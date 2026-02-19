@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/products">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            <!-- Placeholder for product image -->
            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 300px; border-radius: 8px;">
                <span class="text-muted h4">{{ $product->name }} Image</span>
            </div>
        </div>
        <div class="col-md-6">
            <h1 class="mb-3">{{ $product->name }}</h1>
            <p class="h5 text-muted mb-4">CAS Number: {{ $product->cas_number }}</p>
            
            <div class="mb-4">
                <h5>Description</h5>
                <p>{{ $product->description }}</p>
            </div>
            
            <div class="mb-4">
                <h5>Chemical Formula</h5>
                <p><code>{{ $product->chemical_formula }}</code></p>
            </div>

            <a href="/contact" class="btn btn-primary btn-lg">Request Quote</a>
        </div>
    </div>
</div>
@endsection

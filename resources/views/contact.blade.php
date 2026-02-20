@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <!-- 1. Contact Header Section -->
    <div class="contact-header-section">
        <div class="container">
            <h1 data-aos="fade-down">Contact Us</h1>
            <p data-aos="fade-up" data-aos-delay="200">
                Reach out to Devseas Global for any inquiries about our premium products.<br>
                Let's work together to meet your needs with excellence and reliability.
            </p>
            <div class="breadcrumbs" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ url('/') }}">Home</a> <i class="fas fa-chevron-right"></i> <span>Contact</span>
            </div>
        </div>
    </div>

    <!-- 2. Contact Info & Map Section -->
    <div class="contact-info-section">
        <div class="container">
            <!-- Info Cards -->
            <div class="contact-info-grid">
                <!-- Email -->
                <div class="c-info-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="c-icon"><i class="fas fa-envelope"></i></div>
                    <div class="c-details">
                        <h4>Email Us</h4>
                        <p>Feel free to contact us at</p>
                        <a href="mailto:info@devseasglobal.com">info@devseasglobal.com</a>
                        <p class="small-text">we'll respond promptly</p>
                    </div>
                </div>

                <!-- Address -->
                <div class="c-info-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="c-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="c-details">
                        <h4>Address</h4>
                        <p>FF-16 Kanha Luxuria, Savita Hospital Road,<br>
                            Parivar Char Rasta,<br>
                            Vadodara, Gujarat 390025</p>
                    </div>
                </div>

                <!-- Call Us -->
                <div class="c-info-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="c-icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="c-details">
                        <h4>Call Us</h4>
                        <a href="tel:+4915560547524">+49 15560 547524</a><br>
                        <a href="tel:+916352322122">+91 63523 22122</a>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="contact-map" data-aos="zoom-in" data-aos-delay="400">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.0673895916357!2d73.19!3d22.3!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc5f4e7d8db71%3A0x6d6f1d1db9e0ef7f!2sParivar%20Char%20Rasta%2C%20Vadodara%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    <!-- 3. Request Product Information Form -->
    <div class="request-form-section">
        <div class="container">
            <h2 data-aos="fade-up">Request Product Information</h2>
            
            @if(session('success'))
                <div class="alert alert-success" data-aos="fade-up">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger" data-aos="fade-up">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/contact') }}" method="POST" class="request-form" data-aos="fade-up" data-aos-delay="200">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label>First Name*</label>
                        <input type="text" name="first_name" required value="{{ old('first_name') }}">
                    </div>
                    <div class="form-group">
                        <label>Last Name*</label>
                        <input type="text" name="last_name" required value="{{ old('last_name') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Email address*</label>
                        <input type="email" name="email" required value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label>Mobile Number*</label>
                        <input type="tel" name="phone" placeholder="+91-XXXXXXXXXX" required value="{{ old('phone') }}">
                    </div>
                </div>

                <div class="form-group full-width">
                    <label>Product Categories & Selection</label>
                    <p class="form-instruction">Select categories to see available products, then choose specific
                        products you're interested in.</p>
                    <div class="checkbox-grid">
                        <label class="checkbox-item"><input type="checkbox" name="categories[]" value="Pharmaceutical APIs"> Pharmaceutical APIs</label>
                        <label class="checkbox-item"><input type="checkbox" name="categories[]" value="Pharmaceutical Excipients"> Pharmaceutical Excipients</label>
                        <label class="checkbox-item"><input type="checkbox" name="categories[]" value="Antacid Products"> Antacid Products</label>
                        <label class="checkbox-item"><input type="checkbox" name="categories[]" value="Electrolytes"> Electrolytes</label>
                        <label class="checkbox-item"><input type="checkbox" name="categories[]" value="Food & Beverage Ingredients"> Food & Beverage Ingredients</label>
                        <label class="checkbox-item"><input type="checkbox" name="categories[]" value="Nutraceuticals"> Nutraceuticals</label>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Request Information</button>
            </form>
        </div>
    </div>
@endsection

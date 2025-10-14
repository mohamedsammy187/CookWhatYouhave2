@extends('layouts.master')

{{-- اخفاء الـ Hero --}}
@section('hero')
@endsection


@section('content')

<div class="container py-5">
    <h2 class="mb-4 fw-bold text-center">⭐ Add Client Review</h2>

    <div class="p-4 shadow-lg rounded bg-light">

        <form method="POST" action="{{ route('reviews.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Client Name -->
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Client Name</label>
                <input type="text" class="form-control" required name="name" id="name"
                       placeholder="Enter client name" value="{{ old('name') }}">
                <span class="text-danger">
                    @error('name') {{ $message }} @enderror
                </span>
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label for="phone" class="form-label fw-bold">Phone</label>
                <input type="text" class="form-control" required name="phone" id="phone"
                       placeholder="Enter phone number" value="{{ old('phone') }}">
                <span class="text-danger">
                    @error('phone') {{ $message }} @enderror
                </span>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" class="form-control" required name="email" id="email"
                       placeholder="Enter email address" value="{{ old('email') }}">
                <span class="text-danger">
                    @error('email') {{ $message }} @enderror
                </span>
            </div>

            <!-- Subject -->
            <div class="mb-3">
                <label for="subject" class="form-label fw-bold">Subject</label>
                <input type="text" class="form-control" required name="subject" id="subject"
                       placeholder="Enter subject (ex: Great Service)" value="{{ old('subject') }}">
                <span class="text-danger">
                    @error('subject') {{ $message }} @enderror
                </span>
            </div>

            <!-- Message -->
            <div class="mb-3">
                <label for="message" class="form-label fw-bold">Message</label>
                <textarea class="form-control" required name="message" id="message" rows="4"
                          placeholder="Enter client feedback">{{ old('message') }}</textarea>
                <span class="text-danger">
                    @error('message') {{ $message }} @enderror
                </span>
            </div>

            <!-- Image Upload -->
            <div class="mb-3">
                <label for="imagepath" class="form-label fw-bold">Client Photo</label>
                <input type="file" class="form-control" name="imagepath" id="imagepath" accept="image/*">
                <span class="text-danger">
                    @error('imagepath') {{ $message }} @enderror
                </span>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-success w-100">
                <i class="fas fa-user-plus me-2"></i> Add Review
            </button>
        </form>
    </div>
</div>

<div class="container py-5">
    <div class="text-center mb-5">
        <h4 class="text-primary">Our Testimonial</h4>
        <h1 class="display-5 fw-bold">What Clients Say</h1>
    </div>

    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            @foreach ($reviews as $key => $item)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card shadow-lg border-0 rounded-4 p-4">
                                <div class="card-body text-center">
                                    <i class="fa fa-quote-right fa-2x text-primary mb-3"></i>
                                    <p class="mb-4">{{ $item->message }}</p>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img src="{{ asset($item->imagepath) }}"
                                            class="rounded-circle border border-3 border-primary"
                                            style="width: 90px; height: 90px; object-fit: cover;" alt="{{ $item->name }}">
                                    </div>
                                    <h5 class="mt-3 text-dark fw-bold">{{ $item->name }}</h5>
                                    <p class="text-muted">{{ $item->subject }}</p>
                                    <div class="text-warning fs-5">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
@endsection

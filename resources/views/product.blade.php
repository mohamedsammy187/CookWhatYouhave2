@extends('layouts.master')

{{-- اخفاء الـ Hero --}}
@section('hero')
@endsection





@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5">Our Products</h1>

        <!-- Filter Buttons -->
        <div class="text-center mb-4">
            <a href="{{ route('shop') }}" class="btn {{ $catid == 0 ? 'btn-primary' : 'btn-outline-primary' }} mx-2">
                All
            </a>
            @foreach ($categories as $cat)
                <a href="{{ route('shop', $cat->id) }}"
                    class="btn {{ $catid == $cat->id ? 'btn-primary' : 'btn-outline-primary' }} mx-2">
                    {{ $cat->name }}
                </a>
            @endforeach


        </div>

        <!-- Flash Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Products Grid -->
        <div class="row g-4">
            @forelse ($products as $item)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100 shadow-sm border-0">
                        <!-- Product Image -->
                        <a href="{{ route('shop.detail', $item->id) }}">
                            <img src="{{ asset($item->imagepath) }}" class="card-img-top rounded-top"
                                style="width: 100%; height: 250px; object-fit: cover;" alt="{{ $item->name }}">
                        </a>

                        <!-- Product Details -->
                        <div class="card-body text-center">
                            <h4 class="card-title fw-bold">{{ $item->name_en }}</h4>
                            {{-- <h5 class="card-title fw-bold">{{ $item->name_ar  }}</h5> --}}
                            {{-- <h5 class="card-title fw-bold">{{ $item->name }}</h5> --}}
                            <p class="text-muted mb-2">{{ Str::limit($item->description, 60) }}</p>
                            <p class="fw-bold text-success mb-3">${{ $item->price }}</p>

                            <!-- Rating -->
                            <div class="d-flex justify-content-center mb-3">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                <a href="{{ route('shop.detail', $item->id) }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('product.remove', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete {{ $item->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="alert alert-info">No products found.</div>
                </div>
            @endforelse
            <div style="text-align: center; margin:0px auto;">

                {{ $products->links() }}
            </div>

        </div>
    </div>
@endsection
<style>
    svg{
        height: 50px;
    }
</style>

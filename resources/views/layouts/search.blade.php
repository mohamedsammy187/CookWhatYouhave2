@extends('layouts.master')
{{-- اخفاء الـ Hero --}}
@section('hero')
@endsection

@section('content')

<!-- ✅ Search Modal (واحد بس، مش متكرر) -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-3">
            <div class="modal-header border-0">
                <h5 class="modal-title text-success" id="searchModalLabel">Search Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('search') }}" method="POST" class="d-flex">
                    @csrf
                    <input type="text" name="searchkey" class="form-control me-2" placeholder="Enter product name..." required>
                    <button type="submit" class="btn btn-success">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ✅ Search Results -->
<div class="container py-5">
    <h2 class="mb-4">Search Results</h2>

    @if(isset($products) && $products->count() > 0)
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <img src="{{ asset($product->imagpath) }}"
                        class="card-img-top"
                        style="height: 250px;width: 250px; object-fit: cover;"
                        alt="{{ $product->name }}">

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted">{{ $product->description }}</p>
                            <p class="fw-bold text-success">${{ $product->price }}</p>
                            <a href="{{ url('product/'.$product->id) }}" class="btn btn-success btn-sm">View</a>
                            <a href="{{ url('cart/add/'.$product->id) }}" class="btn btn-outline-success btn-sm">Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">No products found.</p>
    @endif
</div>

@endsection

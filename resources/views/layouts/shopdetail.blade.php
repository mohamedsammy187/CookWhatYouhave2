@extends('layouts.master')
{{-- اخفاء الـ Hero --}}
@section('hero')
@endsection

@section('content')
    <div class="container py-5">
        @if ($product)
            <div class="row g-4">
                <!-- صورة المنتج -->
                <div class="col-md-6 text-center">
                    <img src="{{ url($product->imagepath ?? 'asset/img/default.png') }}"
                        class="img-fluid rounded shadow-sm border" style="width: 250px; height: 250px; object-fit: cover;"
                        alt="{{ $product->name_en }}">
                </div>

                <!-- تفاصيل المنتج -->
                <div class="col-md-6">
                    <h2 class="fw-bold mb-2">
                        {{ app()->getLocale() === 'ar' ? $product->name_ar : $product->name_en }}
                    </h2>
                    <p class="text-muted mb-4">{{ $product->description }}</p>
                    <h4 class="text-success mb-4">{{ number_format($product->price, 2) }} EGP</h4>

                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-cart-plus me-2"></i> Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="alert alert-warning text-center">
                Product not found.
            </div>
        @endif
    </div>
@endsection

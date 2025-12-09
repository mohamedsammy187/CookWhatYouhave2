@extends('layouts.master')
{{-- اخفاء الـ Hero --}}
@section('hero')
@endsection

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-5">Edit Product</h2>

        <!-- Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-lg p-4">
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Product EN_Name</label>
                    <input type="text" class="form-control" id="name" name="name_en"
                        value="{{ old('name', $product->name_en) }}" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Product AR_Name</label>
                    <input type="text" class="form-control" id="name" name="name_ar"
                        value="{{ old('name', $product->name_ar) }}" required>
                </div>
                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Price ($)</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price"
                        value="{{ old('price', $product->price) }}" required>
                </div>

                <!-- Quantity -->
                <div class="mb-3">
                    <label for="quantity" class="form-label fw-bold">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity"
                        value="{{ old('quantity', $product->quantity) }}" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label for="cat_id" class="form-label fw-bold">Category</label>
                    <select name="cat_id" id="cat_id" class="form-select" required>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $product->cat_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name_en }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label for="imagepath" class="form-label fw-bold">Product Image</label>
                    <input type="file" class="form-control" id="imagepath" name="imagepath">

                    @if ($product->imagepath)
                        <div class="mt-3">
                            <p class="fw-bold">Current Image:</p>
                            <img src="{{ asset($product->imagepath) }}" alt="Product Image" width="200" height="200"
                                style="width: 150px; height: 150px; object-fit: cover;" class="rounded shadow-sm">
                        </div>
                    @endif
                </div>

                <!-- Submit + Cancel -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('shop') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-2"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-2"></i> Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

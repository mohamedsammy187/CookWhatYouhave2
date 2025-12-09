@extends('layouts.admin')


@section('content')
    <div class="container py-5">
        <h2 class="mb-4 fw-bold text-center">➕ Add New Product</h2>

        <div class="p-4 shadow-lg rounded bg-light">

            <form method="POST" action="/storeproduct" enctype="multipart/form-data">
                @csrf()
                <!-- Product Name -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Product EN_Name</label>
                    <input type="text" class="form-control" required name="name_en" id="name"
                        placeholder="Enter product english name" value="{{ old('name_en') }}">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                                <!-- Product Name -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Product AR_Name</label>
                    <input type="text" class="form-control" required name="name_ar" id="name"
                        placeholder="Enter product arabic name" value="{{ old('name_ar') }}">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Price (EGP)</label>
                    <input type="number" step="0.01" class="form-control" required name="price" id="price"
                        placeholder="Enter price" value="{{ old('price') }}">
                    <span class="text-danger">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <!-- Quantity -->
                <div class="mb-3">
                    <label for="quantity" class="form-label fw-bold">Quantity</label>
                    <input type="number" class="form-control" required name="quantity" id="quantity"
                        placeholder="Enter quantity"value="{{ old('quantity') }}">
                    <span class="text-danger">
                        @error('quantity')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea class="form-control" required name="description" id="description" rows="3"
                        placeholder="Enter product description"></textarea>
                    {{ old('description') }}
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <!-- Image Upload -->
                <div class="mb-3">
                    <label for="imagepath" class="form-label fw-bold">Product Image</label>
                    <input type="file" class="form-control" name="imagepath" id="imagepath" accept="image/*">

                    <span class="text-danger">
                        @error('imagepath')
                            {{ $message }}
                        @enderror
                    </span>
                </div>


                <!-- Category -->
                <div class="mb-3">
                    <label for="cat_id" class="form-label fw-bold">Category</label>
                    <select name="cat_id" required id="cat_id" class="form-select">
                        @foreach ($allcategories as $item)
                            <option value="{{ $item->id }}">{{ $item->name_en ?? $item->name }}</option>
                        @endforeach

                    </select>
                    <span>
                        @error('cat_id')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-success w-100">
                    <i class="fas fa-plus-circle me-2 "></i> Add Product
                </button>
            </form>
        </div>
    </div>

    
@endsection
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
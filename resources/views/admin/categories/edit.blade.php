@extends('layouts.admin')

@section('content')
    <div class="edit-category-form">
        <h1>Edit Category</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name EN -->
            <div class="form-group mb-3">
                <label>Name (EN):</label>
                <input type="text" name="name_en" class="form-control" value="{{ old('name_en', $category->name_en) }}"
                    required>
            </div>

            <!-- Name AR -->
            <div class="form-group mb-3">
                <label>Name (AR):</label>
                <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar', $category->name_ar) }}"
                    required>
            </div>

            <!-- Description -->
            <div class="form-group mb-3">
                <label>Description:</label>
                <textarea name="description" class="form-control">{{ old('description', $category->description) }}</textarea>
            </div>

            <!-- Ordering -->
            <div class="form-group mb-3">
                <label>Ordering:</label>
                <input type="number" name="Ordering" class="form-control"
                    value="{{ old('Ordering', $category->Ordering) }}">
            </div>

            <!-- Visibility -->
            <div class="form-group mb-3">
                <label>Visibility:</label>
                <select name="Visibility" class="form-control">
                    <option value="1" {{ old('Visibility', $category->Visibility) == 1 ? 'selected' : '' }}>Visible
                    </option>
                    <option value="0" {{ old('Visibility', $category->Visibility) == 0 ? 'selected' : '' }}>Hidden
                    </option>
                </select>
            </div>

            <!-- Allow Comments -->
            <div class="form-group mb-3">
                <label>Allow Comments:</label>
                <select name="Allow_Comments" class="form-control">
                    <option value="1" {{ old('Allow_Comments', $category->Allow_Comments) == 1 ? 'selected' : '' }}>
                        Allow</option>
                    <option value="0" {{ old('Allow_Comments', $category->Allow_Comments) == 0 ? 'selected' : '' }}>
                        Block</option>
                </select>
            </div>

            <!-- Allow Ads -->
            <div class="form-group mb-3">
                <label>Allow Ads:</label>
                <select name="Allow_Ads" class="form-control">
                    <option value="1" {{ old('Allow_Ads', $category->Allow_Ads) == 1 ? 'selected' : '' }}>Allow
                    </option>
                    <option value="0" {{ old('Allow_Ads', $category->Allow_Ads) == 0 ? 'selected' : '' }}>Block
                    </option>
                </select>
            </div>

            <!-- Image -->
            <div class="form-group mb-3">
                <label>Category Image:</label>
                <input type="file" name="imagepath" class="form-control">
                @if ($category->imagepath)
                    <img src="{{ asset($category->imagepath) }}" alt="Category Image" width="100" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-success">Update Category</button>
            <a href="{{ route('admin.categories') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
<style>
    /* ===== Container ===== */
    .edit-category-form {
        width: 500px;
        margin: 40px auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    /* ===== Form Title ===== */
    .edit-category-form h1 {
        text-align: center;
        font-size: 28px;
        color: #0d6efd;
        margin-bottom: 25px;
        font-weight: bold;
    }

    /* ===== Form Groups ===== */
    .edit-category-form .form-group {
        margin-bottom: 18px;
    }

    .edit-category-form label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #34495e;
    }

    /* ===== Inputs & Textarea ===== */
    .edit-category-form input[type="text"],
    .edit-category-form input[type="number"],
    .edit-category-form select,
    .edit-category-form textarea,
    .edit-category-form input[type="file"] {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        transition: 0.2s;
    }

    .edit-category-form input:focus,
    .edit-category-form textarea:focus,
    .edit-category-form select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 5px rgba(13, 110, 253, 0.4);
        outline: none;
    }

    /* ===== Radio Groups ===== */
    .edit-category-form .radio-group {
        display: flex;
        gap: 20px;
        margin-top: 5px;
    }

    .edit-category-form .radio-option {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .edit-category-form .radio-option input[type="radio"] {
        accent-color: #0d6efd;
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    /* ===== Submit Button ===== */
    .edit-category-form .btn-submit {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 600;
        background-color: #0d6efd;
        color: white;
        cursor: pointer;
        transition: 0.2s;
    }

    .edit-category-form .btn-submit:hover {
        background-color: #0b5ed7;
    }

    /* ===== Responsive ===== */
    @media (max-width: 576px) {
        .edit-category-form {
            width: 90%;
            padding: 20px;
        }
    }
</style>

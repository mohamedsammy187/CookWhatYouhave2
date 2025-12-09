@extends('layouts.admin') {{-- extend your admin layout --}}

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Add New Category</h1>

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
    @csrf

    <!-- Name EN -->
    <div class="form-group mb-3">
        <label for="name_en">Name (EN):</label>
        <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}" required>
    </div>

    <!-- Name AR -->
    <div class="form-group mb-3">
        <label for="name_ar">Name (AR):</label>
        <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar') }}" required>
    </div>

    <!-- Description -->
    <div class="form-group mb-3">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
    </div>

    <!-- Ordering -->
    <div class="form-group mb-3">
        <label for="Ordering">Ordering:</label>
        <input type="number" class="form-control" id="Ordering" name="Ordering" value="{{ old('Ordering', 0) }}">
    </div>

    <!-- Visibility -->
    <div class="form-group mb-3">
        <label for="Visibility">Visibility:</label>
        <select class="form-control" id="Visibility" name="Visibility">
            <option value="1" {{ old('Visibility', 1) == 1 ? 'selected' : '' }}>Visible</option>
            <option value="0" {{ old('Visibility') == 0 ? 'selected' : '' }}>Hidden</option>
        </select>
    </div>

    <!-- Allow Comments -->
    <div class="form-group mb-3">
        <label for="Allow_Comments">Allow Comments:</label>
        <select class="form-control" id="Allow_Comments" name="Allow_Comments">
            <option value="1" {{ old('Allow_Comments', 1) == 1 ? 'selected' : '' }}>Allow</option>
            <option value="0" {{ old('Allow_Comments') == 0 ? 'selected' : '' }}>Block</option>
        </select>
    </div>

    <!-- Allow Ads -->
    <div class="form-group mb-3">
        <label for="Allow_Ads">Allow Ads:</label>
        <select class="form-control" id="Allow_Ads" name="Allow_Ads">
            <option value="1" {{ old('Allow_Ads', 1) == 1 ? 'selected' : '' }}>Allow</option>
            <option value="0" {{ old('Allow_Ads') == 0 ? 'selected' : '' }}>Block</option>
        </select>
    </div>

    <!-- Image Upload -->
    <div class="form-group mb-3">
        <label for="imagepath">Category Image:</label>
        <input type="file" class="form-control" id="imagepath" name="imagepath" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-success">Add Category</button>
    <a href="{{ route('admin.categories') }}" class="btn btn-secondary">Back</a>
</form>

</div>
@endsection

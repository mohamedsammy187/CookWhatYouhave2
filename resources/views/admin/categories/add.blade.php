@extends('layouts.admin')
@section('content')
    <!-- ✅ Bootstrap 5 CSS (optional if already in master) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

    <!-- ✅ DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">





    <div class="category-form">
        <h1><i class="fa fa-plus"></i>Add New Category</h1>
        <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name EN -->
            <div class="form-group mb-3">
                <label for="name_en">Name (EN):</label>
                <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}"
                    required>
            </div>

            <!-- Name AR -->
            <div class="form-group mb-3">
                <label for="name_ar">Name (AR):</label>
                <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar') }}"
                    required>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label>Description:</label>
                <textarea class="form-control" name="description"></textarea>
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
                <label>Category Image:</label>
                <input type="file" class="form-control" name="imagepath" accept="image/*" required>
            </div>

            <button type="submit" class="submit-btn">Add Category</button>
        </form>

    </div>

    <style>
        /* ===== Global Form Styling ===== */
        .form-container {
            width: 450px;
            margin: 40px auto;
            padding: 25px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: bold;
            color: #0d6efd;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            transition: 0.2s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.4);
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            border: none;
            font-size: 16px;
            border-radius: 6px;
            background: #0d6efd;
            color: white;
            cursor: pointer;
            transition: 0.2s;
        }

        .submit-btn:hover {
            background: #0b5ed7;
        }

        /* ===== Category Form Styling ===== */
        .category-form {
            width: 500px;
            margin: 40px auto;
            padding: 25px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
        }

        .category-form h1 {
            text-align: center;
            color: #0d6efd;
            font-size: 28px;
            margin-bottom: 25px;
        }

        .category-form .form-group {
            margin-bottom: 18px;
        }

        .category-form label {
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
        }

        /* Radio Group */
        .radio-group {
            display: flex;
            gap: 25px;
            margin-top: 5px;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Custom Radio */
        .radio-option input[type="radio"] {
            accent-color: #0d6efd;
            /* Modern browsers support this */
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            border: none;
            font-size: 16px;
            background: #0d6efd;
            color: #fff;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.2s;
        }

        .submit-btn:hover {
            background: #0b5ed7;
        }
    </style>

    <!-- ✅ jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- ✅ Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ✅ DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
@endsection

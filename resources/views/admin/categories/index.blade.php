@extends('layouts.admin')
@section('content')
    <!-- ✅ Bootstrap 5 CSS (optional if already in master) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

    <!-- ✅ DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">


    <h1 class="text-center"><i class="fa fa-edit"></i> Manage Categories</h1>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Add Category</a>

    <table class="table table-bordered table-striped" width="100%">
        <tr>
            <th>ID</th>
            <th>Name (EN)</th>
            {{-- <th>Name (AR)</th> --}}
            <th>Description</th>
            <th>
                <i class="fa fa-sort"></i>Ordering
                <div class="ordering pull-right">
                    <span>Sort:</span>
                    <a class="sort-btn {{ $sort == 'ASC' ? 'active' : '' }}" href="?sort=ASC"></a>

                    <a class="sort-btn {{ $sort == 'DESC' ? 'active' : '' }}" href="?sort=DESC">▼</a>

                </div>
            </th>

            <th>
                Visible

            </th>
            <th>Allow Comments</th>
            <th>Allow Ads</th>
            <th>Control</th>
        </tr>

        <?php foreach ($categories as $cat): ?>
        <tr class="cat-row">
            <td><?= $cat['id'] ?></td>

            <td>
                <h3 class="cat-title"><?= $cat['Name'] ?></h3>
            </td>

            <td><?= $cat['description'] == '' ? 'No description' : $cat['description'] ?></td>

            <td><?= $cat['Ordering'] ?></td>

            <td>
                <?php if ($cat['Visibility'] == 0): ?>
                <span class="badge hidden-badge"><i class="fa fa-close"></i> Hidden</span>
                <?php else: ?>
                <span class="badge shown-badge"><i class="fa fa-eye"></i> Shown</span>
                <?php endif; ?>
            </td>

            <td>
                <?php if ($cat['Allow_Comments'] == 0): ?>
                <span class="badge hidden-badge"><i class="fa fa-close"></i> Hidden</span>
                <?php else: ?>
                <span class="badge shown-badge"><i class="fa fa-eye"></i> Allowed</span>
                <?php endif; ?>
            </td>

            <td>
                <?php if ($cat['Allow_Ads'] == 0): ?>
                <span class="badge hidden-badge"><i class="fa fa-close"></i> Hidden</span>
                <?php else: ?>
                <span class="badge shown-badge"><i class="fa fa-eye"></i> Allowed</span>
                <?php endif; ?>
            </td>

            <td>
                <div class="cat-controls">
                    <a href="{{ route('admin.categories.edit', ['id' => $cat['id']]) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form action="{{route('admin.categories.destroy' , $cat->id)}}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>

                    {{-- <a href=" {{route('admin.categories.destroy' ,['id'=>$cat['id']])}}>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure?');">
                        <i class="fa fa-trash"></i> Delete
                    </a> --}}
                </div>
            </td>
        </tr>

        <!-- Full View Section -->
        <tr class="full-view-row">
            <td colspan="8">
                <div class="full-view">
                    <p><strong>Description:</strong> <?= $cat['description'] ?></p>
                    <p><strong>Visibility:</strong> <?= $cat['Visibility'] == 1 ? 'Shown' : 'Hidden' ?></p>
                    <p><strong>Comments:</strong> <?= $cat['Allow_Comments'] == 1 ? 'Allowed' : 'Hidden' ?></p>
                    <p><strong>Ads:</strong> <?= $cat['Allow_Ads'] == 1 ? 'Allowed' : 'Hidden' ?></p>
                </div>
            </td>
        </tr>

        </tr>



        <?php endforeach; ?>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </table>
    <style>
        .visibility,
        .advertising {
            background: #c0392b;
            color: #fff;
            padding: 4px 6px;
            margin-right: 6px;
            border-radius: 6px;
        }

        .commenting {
            background: #2c3e50;
            color: #fff;
            padding: 4px 6px;
            margin-right: 6px;
            border-radius: 6px;
        }

        .cat {
            padding: 15px;
            overflow: hidden;
        }

        .cat:hover {
            right: 10px;
        }

        .cat:hover .hidden-buttons {
            right: 10px;
        }

        .cat .hidden-buttons {
            -webkit-transition: all .5s ease-in-out;
            -moz-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
            position: absolute;
            top: 15px;
            right: -120px;
        }

        /* Status badges */
        .hidden-badge {
            background: #c0392b;
            color: white;
            padding: 4px 8px;
            border-radius: 6px;
        }

        .shown-badge {
            background: #27ae60;
            color: white;
            padding: 4px 8px;
            border-radius: 6px;
        }

        /* Hover buttons */
        .cat-row {
            position: relative;
        }

        .cat-controls {
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .cat-row:hover .cat-controls {
            opacity: 1;
        }


        /* sorted by asc or desc */

        .ordering {
            float: right;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .ordering span {
            font-size: 12px;
            color: #555;
        }

        .sort-btn {
            display: inline-block;
            padding: 4px 8px;
            background: #ecf0f1;
            border-radius: 4px;
            font-weight: bold;
            text-decoration: none;
            color: #2c3e50;
            transition: 0.3s;
        }

        .sort-btn:hover {
            background: #bdc3c7;
        }

        .sort-btn.active {
            background: #3498db;
            color: white;
        }

        .cat-title {
            cursor: pointer;
            font-weight: bold;
            color: #2980b9;
        }

        .full-view {
            background: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #3498db;
            border-radius: 8px;
            display: none;
            margin-top: 5px;
        }

        .full-view-row td {
            border-top: none !important;
        }
    </style>


    <?php
    //} else {
    //echo "<div class='container'>";
    //$theMsg = '<div class="alert alert-danger">You cannot access this page directly.</div>';
    //redirectHome($theMsg, 'back');
    //echo "</div>";
    //}
    ?>
    <!-- ✅ jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- ✅ Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ✅ DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            let table = new DataTable('#myTable');
        });
    </script>

    <script>
        $('.cat-title').click(function() {
            $(this).closest('tr').next('.full-view-row').find('.full-view').fadeToggle(200);
        });
    </script>
@endsection

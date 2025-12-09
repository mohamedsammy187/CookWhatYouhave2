@extends('layouts.admin')

@section('content')   
     <h2 class="fw-bold">Admin Dashboard</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card p-3 shadow">
                <h4>Total Products</h4>
                <p>{{ $productsCount }}</p>
                <span>
                    <a href="{{ route('admin.products') }}">Products</a>
                </span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow">
                <h4>Total Categories</h4>
                <p>{{ $categoriesCount }}</p>
                <span>
                    <a href="{{ route('admin.categories') }}">Categories</a>
                </span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3 shadow">
                <h4>Total Users</h4>
                <p>{{ $usersCount }}</p>
                <span>
                    <a href="{{ route('admin.users') }}">Users</a>
                </span>
            </div>
        </div>
    </div>
<!-- Latest Users & Items -->
<div class="row">

    <!-- Latest Users -->
    <div class="col-md-6">
        <div class="card shadow-sm mb-3 latest-users-card">
            <div class="card-header bg-primary text-white">
                <i class="fa fa-users"></i> Latest Registered Users
            </div>

            <ul class="list-group list-group-flush">
                @foreach ($latestUsers as $user)
                    <li class="list-group-item d-flex justify-content-between align-items-center">

                        <div class="d-flex align-items-center">
                            <i class="fa fa-user"></i>
                            <span class="username ms-2">{{ $user->name }}</span>
                        </div>

                        <div>
                            <a href="{{ url('members/edit/' . $user->id) }}" class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>

                            {{-- @if ($user->RegStatus == 0) --}}
                                <a href="{{ url('members/activate/' . $user->id) }}"
                                   class="btn btn-info btn-sm activate">
                                    <i class="fa fa-check"></i> Activate
                                </a>
                            {{-- @endif --}}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Latest Items -->
    <div class="col-md-6">
        <div class="card shadow-sm mb-3 latest-items-card">
            <div class="card-header bg-success text-white">
                <i class="fa fa-box"></i> Latest Added Items
            </div>

            <ul class="list-group list-group-flush">
                @foreach ($latestItems as $i)
                    <li class="list-group-item latest-item">
                        <div class="item-header d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-box"></i>
                                {{ $i->name_en ?? $i->Name }}
                            </div>

                            <button class="toggle-details btn btn-sm btn-info">
                                Details <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>

                        <div class="item-details">
                            <p><strong>Name:</strong> {{ $i->Name }}</p>

                            <p><strong>Description:</strong>
                                {{ !empty($i->Description) ? $i->Description : 'No description' }}
                            </p>

                            <p><strong>Comments:</strong> {{ $i->Allow_Comment }}</p>
                            <p><strong>Ads:</strong> {{ $i->Allow_Ads }}</p>

                            <div class="cat-controls">
                                <a href="{{ url('categories/edit/' . $i->CatID) }}" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                <a href="{{ url('categories/delete/' . $i->CatID) }}"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure?');">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </div>
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>

@endsection

</div>
<div>
    <script>
        document.querySelectorAll('.toggle-details').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const details = this.closest('.latest-item').querySelector('.item-details');
                details.style.display = details.style.display === 'block' ? 'none' : 'block';
                this.classList.toggle('open');
            });
        });
    </script>


    <script src="layout/js/bootstrap.bundle.min.js"></script>
</div>

<?php ob_end_flush(); ?>
    
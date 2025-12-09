@extends('layouts.master')
{{-- اخفاء الـ Hero --}}
@section('hero')
@endsection

@section('content')
    <div class="container py-5">
        <div class="row g-4">

            @foreach ($products as $item)
            {{@dd($item)}}
                <div class="col-lg-6">
                    <div class="border rounded p-3 h-100">
                        <a href="/shopdetail/{{ $item->id }}">
                            <img src="{{ URL($item->imagepath) }}" alt="{{ $item->name_en }}" class="img-fluid rounded mb-3"
                            style="max-height: 250px; min-height: 250px; object-fit: cover;">
                        </a>

                        <h4 class="fw-bold mb-2">
                            {{ app()->getLocale() === 'ar' ? $item->name_ar : $item->name_en }}
                        </h4>
                        <p class="mb-2">Category: {{ $item->cat_id }}</p>
                        <h5 class="fw-bold text-success mb-3">{{ $item->price }} EGP</h5>

                        <div class="d-flex mb-3">
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star"></i>
                        </div>

                        <p class="mb-4">"{{ $item->description }}"</p>

                        <div class="input-group quantity mb-4" style="width: 120px;">
                            <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                <i class="fa fa-minus"></i>
                            </button>
                            <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                            <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>

                        <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-3 text-primary">
                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection

{{-- @extends('layouts.cookwhatyouhave') --}}
@extends('layouts.master')
{{-- اخفاء الـ Hero --}}
@section('hero')
@endsection

@section('content')
<div class="vesitable">
    <div class="owl-carousel vegetable-carousel justify-content-center">
        @foreach ($categories as $item)
            <div class="border border-primary rounded position-relative vesitable-item">
                <div class="ph">
                    <a href="{{ route('shop', $item->id) }}">
                        <img src="{{    ($item->imagepath) }}"
                             class="img-fluid w-100 rounded-top"
                             style="width: 250px; height: 250px; object-fit: cover;"
                             alt="{{ $item->name_en }}">
                    </a>
                </div>
                <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">
                   {{ $item->name }}
                </div>
                <div class="p-4 pb-0 rounded-bottom">
                    <h4>{{ $item->name }}</h4>
                    <p>{{ $item->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

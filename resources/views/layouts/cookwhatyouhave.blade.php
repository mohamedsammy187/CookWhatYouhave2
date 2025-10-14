@extends('layouts.master')


@section('content')



<div class="container py-5">
    <h2 class="text-success mb-4">🍳 Cook What You Have</h2>

    <!-- Suggested Meals -->
    <div class="row g-4">
        @foreach($suggestedMeals ?? [] as $meal)
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <!-- ✅ الصورة هنا -->
                    <img src="{{ asset($meal['image']) }}" class="card-img-top"
                    width="250px" height="250px"
                    alt="{{ $meal['title'] }}">


                    <div class="card-body">
                        <h5 class="card-title">{{ $meal['title'] }}</h5>
                        <p class="card-text text-muted">{{ $meal['description'] }}</p>

                        <p><strong>Ingredients:</strong></p>
                        <ul>
                            @foreach($meal['ingredients'] as $ingredient)
                                <li>{{ $ingredient }}</li>
                            @endforeach
                        </ul>

                        <a href="{{ $meal['link'] }}" class="btn btn-success btn-sm">View Recipe</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

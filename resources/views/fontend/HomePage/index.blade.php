@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Product List</h1>

    {{-- Success and Error Alerts --}}
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- Search Form --}}
    <form action="{{ route('home') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search products..." name="search" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    {{-- Product Cards --}}
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($products as $product)
        <div class="col mb-4">
            <div class="card h-100 shadow-sm d-flex flex-column">
                <img src="{{ asset('image/product/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">
                        <strong>Category:</strong> {{ $product->category->name }}<br>
                        <strong>Subcategory:</strong> {{ $product->subcategory->name }}
                    </p>
                    <p class="card-text">Price: ${{ number_format($product->price, 2) }}</p>
                    <p class="card-text">Available Quantity: {{ $product->quantity }}</p>

                    <form action="{{ route('purchase', ['product' => $product->id]) }}" method="POST" class="d-flex ">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm mt-auto">Buy Now</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col">
            <p class="text-center">No products found.</p>
        </div>
        @endforelse
    </div>

    {{-- Pagination Links --}}
    {{ $products->appends(request()->input())->links() }}
</div>
@endsection

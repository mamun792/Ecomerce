@extends('layouts.admin')
@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Product List</h1>
            {{-- success  --}}
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif
            {{-- error  --}}
            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('error')}}
                </div>
            @endif
            <div class="d-flex justify-content-end mb-3">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    <i class="bi bi-plus-circle"></i> Add Product
                </a>
                
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Product Description</th>
                        <th>Product Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->description }}</td>
                        <td><img src="{{ asset('image/product/'.$product->image) }}" alt="" width="100"></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">
                                    Edit
                                </a>
                                @include('admin.product.update-modal')
                               
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{ $product->id }}">
                                    Delete
                                </button>
                                @include('admin.product.delete-product')

                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.product.add-product-model');
    <script>
        var categoryStoreRoute = "{{ route('subcategories') }}";
    </script>
   <script src="{{asset('js/category.js')}}"></script>
   <script src="{{asset('js/update.js')}}"></script>
   <script src="{{asset('js/product-delete.js')}}"></script>
  
</div>


@endsection
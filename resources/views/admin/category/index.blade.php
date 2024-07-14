@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Category</h1>
                <div class="d-flex justify-content-end mb-3">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                        <i class="bi bi-plus-circle"></i> Add Category
                    </a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Category Image</th>
                            <th> Created At</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop through categories --}}
                        @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                       
                        <td><img src="{{ asset('image/category/'.$category->image) }}" alt="" width="100"></td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            {{-- <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('category.delete', $category->id) }}" class="btn btn-danger">Delete</a> --}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       
    </div>

    @include('admin.category.add-category-model')
    <script>
        var categoryStoreRoute = "{{ route('category.store') }}";
    </script>
    <script src="{{asset('js/add-categry.js')}}"></script>
    
@endsection

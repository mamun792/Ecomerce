@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Subcategory
            </div>
            <div class="card-body">
               <div class="d-flex justify-content-end mb-3">
                <a href="{{route('subcategory.create')}}" class="btn btn-primary mb-3">Create</a>
               </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($subcategories as $subcategory)
                        <tr>
                            <td>{{$subcategory->id}}</td>
                            <td>{{$subcategory->name}}</td>
                            <td>{{$subcategory->category->name}}</td>
                            <td>
                                <a href="{{route('subcategory.edit', $subcategory->id)}}" class="btn btn-warning">Edit</a>
                                <a href="{{route('subcategory.destroy', $subcategory->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
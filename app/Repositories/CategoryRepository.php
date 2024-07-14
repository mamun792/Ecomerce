<?php

namespace App\Repositories;
use App\Models\Categories;

class CategoryRepository implements CategoryRepositoryInterface
{
    
    public function all($page)
    {
        return Categories::paginate($page);
    }

    // public function create(array $data)
    // {
    //     return Categories::create($data);
    // }

    public function store(array $data)
    {
        return Categories::create($data);
    }

    public function delete($id)
    {
        return Categories::destroy($id);
    }

    public function find($id)
    {
        return Categories::find($id);
    }
}

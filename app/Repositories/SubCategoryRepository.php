<?php

namespace App\Repositories;
use App\Models\SubCategories;

class SubCategoryRepository implements SubCategoryRepositoryInterface
{
    public function all($page)
    {
        return SubCategories::paginate($page);
    }

    public function store(array $data)
    {
        return SubCategories::create($data);
    }

    public function delete($id)
    {
        return SubCategories::destroy($id);
    }

    public function find($id)
    {
        return SubCategories::find($id);
    }
}

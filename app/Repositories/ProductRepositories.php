<?php

namespace App\Repositories;
use App\Models\Products;
class ProductRepositories implements ProductRepositoriesInterface
{
    public function all($perpage)
    {
        return Products::paginate($perpage);
    }

    public function find($id)
    {
        return Products::find($id);
    }

    public function create(array $data)
    {
        return Products::create($data);
    }

    public function update(array $data, $id)
    {
        return Products::find($id)->update($data);
    }

    public function delete($id)
    {
        return Products::find($id)->delete();
    }

    public function search($data)
    {
        return Products::where('name', 'like', '%' . $data . '%')->get();
    }

    public function withProductSubCategory($perpage, $search = null)
    {
       $query= Products::select('id', 'name', 'price', 'image', 'category_id', 'sub_category_id', 'quantity')
           ->with(['category:id,name', 'subcategory:id,name']);

        if($search){
            $query= Products::select('id', 'name', 'price', 'image', 'category_id', 'sub_category_id', 'quantity')
                ->with(['category:id,name', 'subcategory:id,name'])
                ->where('name', 'like', '%' . $search . '%');
                
        }
        return $query->paginate($perpage);
    }
}

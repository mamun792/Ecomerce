<?php

namespace App\Services;

use App\Repositories\ProductRepositoriesInterface;
use Illuminate\Support\Facades\Log;

class ProductServices implements ProductServicesInterface
{
    protected $productRepositories;
    public function __construct(ProductRepositoriesInterface $productRepositories)
    {
        $this->productRepositories = $productRepositories;
    }
   
    public function all($perpage)
    {
        return $this->productRepositories->all($perpage);
    }

    public function find($id)
    {
        return $this->productRepositories->find($id);
    }

    public function create(array $data)
    {
        
        $file_name = null; 
        if (isset($data['image'])) {
            $file=$data['image'];
             $file_name =   $fileName = $this->uploadImage($file);
         }
        $data['image'] = $file_name;
        $data['slug'] = $data['name'];
      
        Log::info($data);
       
      
        return $this->productRepositories->create($data);
    }

    public function update(array $data, $id)
    {
        if (isset($data['image'])) {
            $file=$data['image'];
            $file_name =   $fileName = $this->uploadImage($file);
            $data['image'] = $file_name;
        }
         //Log::info($data);
        return $this->productRepositories->update($data, $id);
    }

    public function delete($id)
    {
        return $this->productRepositories->delete($id);
    }

    public function search($data)
    {
        return $this->productRepositories->search($data);
    }

    private function uploadImage($image)
    {
        $file_name = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('image/product') . '/' . $file_name;
        move_uploaded_file($image->getPathname(), $imagePath);
        // delete old image if exist
        if (isset($data['image'])) {
            $oldImagePath = public_path('image/product') . '/' . $data['image'];
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        return $file_name;
    }

}

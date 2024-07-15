<?php

namespace App\Services;
use App\Repositories\CategoryRepositoryInterface;

use Illuminate\Support\Facades\Log;

class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
   
    public function all($page)
    {
        return $this->categoryRepository->all($page);
    }

    // public function create(array $data)
    // {
    //     return $this->categoryRepository->create($data);
    // }

    public function store(array $data)
    {
        // image upload logic
       
        $file_name = null; 
        if (isset($data['image'])) {
            $file=$data['image'];
             $file_name =   $fileName = $this->uploadImage($file);
         }
         $data['image'] = $file_name;
         $data['slug'] = $data['name'];
     
         return $this->categoryRepository->store($data);
      
    }

    public function delete($id)
    {
        return $this->categoryRepository->delete($id);
    }

    public function find($id)
    {
        return $this->categoryRepository->find($id);
    }

   private function uploadImage($image)
    {
        $file_name = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('image/category') . '/' . $file_name;
        move_uploaded_file($image->getPathname(), $imagePath);
        return $file_name;
    }

    public function Allproduct()
    {
        return $this->categoryRepository->Allproduct();
    }

    public function getSubcategories(array $data)
    {
        return $this->categoryRepository->getSubcategories($data);
    }
}

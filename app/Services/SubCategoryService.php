<?php

namespace App\Services;

use App\Repositories\SubCategoryRepositoryInterface;
use App\Services\SubCategoryServiceInterface;

class SubCategoryService implements SubCategoryServiceInterface
{
    protected $subCategoryRepository;

    public function __construct(SubCategoryRepositoryInterface $subCategoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;
    }
    
    public function all($page)
    {
        return $this->subCategoryRepository->all($page);
    }

    public function store(array $data)
    {
       
        if(isset($data['image'])){
            $data['image'] = $this->uploadImage($data['image']);
        }
        $data['slug'] = $data['name'];
        return $this->subCategoryRepository->store($data);
    }

    public function delete($id)
    {
        return $this->subCategoryRepository->delete($id);
    }

    public function find($id)
    {
        return $this->subCategoryRepository->find($id);
    }

    private function uploadImage($image)
    {
        $imageName = time().'.'.$image->extension();  
        $image->move(public_path('image/SubCategory'), $imageName);
        return $imageName;
    }
}

<?php

namespace App\Services;

interface CategoryServiceInterface
{
    public function all($page);

  //  public function create(array $data);

    public function store(array $data);

    public function delete($id);

    public function find($id);

    public function Allproduct();

    public function getSubcategories(array $data);
}

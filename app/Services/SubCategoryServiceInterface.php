<?php

namespace App\Services;

interface SubCategoryServiceInterface
{
    public function all($page);

    public function store(array $data);

    public function delete($id);

    public function find($id);
}

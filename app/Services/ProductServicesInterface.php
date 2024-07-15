<?php

namespace App\Services;

interface ProductServicesInterface
{
    public function all($perpage);

    public function find($id);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function search($data);

    public function withProductSubCategory($perpage,$search=null);
}

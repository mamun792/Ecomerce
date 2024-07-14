<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function all($page);

   // public function create(array $data);

    public function store(array $data);

    public function delete($id);

    public function find($id);
}

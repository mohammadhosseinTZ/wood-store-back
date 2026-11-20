<?php

namespace App\Contracts\Interfaces;

interface CategoryRepository
{
    public function getAll();
    public function store(array $data);
    public function update(\App\Models\Category $Category, array $data);
    public function delete(\App\Models\Category $Category);
    public function show(\App\Models\Category $Category);
}

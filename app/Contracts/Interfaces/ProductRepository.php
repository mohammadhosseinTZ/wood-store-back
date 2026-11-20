<?php

namespace App\Contracts\Interfaces;

interface ProductRepository
{
    public function getAll();
    public function store(array $data);
    public function update(\App\Models\Product $product, array $data);
    public function delete(\App\Models\Product $product);
    public function show(\App\Models\Product $product);
}

<?php

namespace App\Repository;

use App\Contracts\Interfaces\ProductRepository;
use App\Models\Product;

class ProductRepositoryImp implements ProductRepository
{
    public function getAll()
    {
        return Product::orderBy("id" , "desc")->paginate(10);
    }
    public function store(array $data)
    {
        $result = Product::create($data);
        return $result;
    }
    public function update(Product $product, array $data)
    {
        $product->update($data);
        return $product;
    }
    public function show(Product $product)
    {
        return $product;
    }
    public function delete(Product $product)
    {
        $product->delete();
        return $product;
    }
}
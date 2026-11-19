<?php

namespace App\Repository;

use App\Contracts\Interfaces\CategoryRepository;
use App\Models\Category;
use Override;

class CategoryRepositoryImp implements CategoryRepository
{
    #[Override]
    public function getAll()
    {
        return Category::with(['children' , 'parent'])->orderBy("id", "desc")->paginate(10);
    }
    #[Override]
    public function store(array $data)
    {
        $result = Category::create($data);
        return $result;
    }
    public function update(Category $category, array $data)
    {
        $category->update($data);
        return $category;
    }
    public function show(Category $category)
    {
        return $category;
    }
    public function delete(Category $category)
    {
        $category->delete();
        return $category;
    }
    public function storeImage(array $data){
        
    }
}

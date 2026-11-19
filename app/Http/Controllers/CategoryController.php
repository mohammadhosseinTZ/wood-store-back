<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryRepository;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        return  $this->successResponse($this->categoryRepository->getAll(), 200);
    }
    public function store(CategoryRequest $categoryRequest)
    {
        return  $this->successResponse($this->categoryRepository->store($categoryRequest->validated()), 200);
    }
    public function update(CategoryRequest $categoryRequest , Category $category )
    {
        return  $this->successResponse($this->categoryRepository->update($category ,$categoryRequest->validated()), 200);
    }
    public function show(Category $category)
    {
        return $this->successResponse($this->categoryRepository->show($category), 200);
    }
    public function destroy(Category $category)
    {
        $result = $this->categoryRepository->delete($category);
        return  $this->successResponse($result, 200);
    }
}

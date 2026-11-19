<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryRepository;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\ImageService;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    private $categoryRepository;
    private $imageService;

    public function __construct(CategoryRepository $categoryRepository, ImageService $imageService)
    {
        $this->categoryRepository = $categoryRepository;
        $this->imageService = $imageService;
    }
    public function index()
    {
        return  $this->successResponse($this->categoryRepository->getAll(), 200);
    }
    public function store(CategoryRequest $categoryRequest)
    {

        $data = $categoryRequest->validated();

        $imagePath = $this->imageService->store(
            $categoryRequest->file('image'),
            'images/category'
        );

        $data['image'] = $imagePath;

        $category = $this->categoryRepository->store($data);

        return $this->successResponse($category, 201);
    }
    public function update(CategoryRequest $categoryRequest, Category $category)
    {
        $data = $categoryRequest->validated();

        if ($categoryRequest->hasFile('image')) {

            $this->imageService->delete($category->image);

            $data['image'] = $this->imageService->store(
                $categoryRequest->file('image'),
                'images/category'
            );
        }

        return $this->successResponse(
            $this->categoryRepository->update($category, $data),
            200
        );
    }
    public function show(Category $category)
    {
        return $this->successResponse($this->categoryRepository->show($category), 200);
    }
    public function destroy(Category $category)
    {
        $result = $this->categoryRepository->delete($category);

        $this->imageService->delete($category->image);
        
        return  $this->successResponse($result, 200);
    }
}

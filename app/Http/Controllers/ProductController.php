<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ProductRepository;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    private $productRepository;
    private $imageService;

    public function __construct(ProductRepository $productRepository, ImageService $imageService)
    {
        $this->productRepository = $productRepository;
        $this->imageService = $imageService;
    }
    public function index()
    {
        return  $this->successResponse($this->productRepository->getAll(), 200);
    }
    public function store(ProductRequest $productRequest)
    {

        $data = $productRequest->validated();

        $imagePath = $this->imageService->store(
            $productRequest->file('image'),
            'images/product'
        );

        $data['image'] = $imagePath;

        $product = $this->productRepository->store($data);

        return $this->successResponse($product, 201);
    }
    public function update(ProductUpdateRequest $productUpdateRequest, Product $product)
    {
        $data = $productUpdateRequest->validated();

        if ($productUpdateRequest->hasFile('image')) {

            $this->imageService->delete($product->image);

            $data['image'] = $this->imageService->store(
                $productUpdateRequest->file('image'),
                'images/product'
            );
        }

        return $this->successResponse(
            $this->productRepository->update($product, $data),
            200
        );
    }
    public function show(Product $product)
    {
        return $this->successResponse($this->productRepository->show($product), 200);
    }
    public function destroy(Product $product)
    {
        $result = $this->productRepository->delete($product);

        $this->imageService->delete($product->image);
        
        return  $this->successResponse($result, 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttributeRepository;
use App\Http\Requests\AttributeRequest;
use App\Http\Requests\AttributeUpdateRequest;
use App\Models\Attribute;

class AttributeController extends ApiController
{
    private $attributeRepository;

    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }
    public function index()
    {
        return $this->successResponse($this->attributeRepository->getAll(), 200);
    }
    public function store(AttributeRequest $attributeRequest)
    {
        return $this->successResponse($this->attributeRepository->store($attributeRequest->validated()), 200);
    }
    public function update(Attribute $attribute, AttributeUpdateRequest $attributeUpdateRequest)
    {
        return $this->successResponse(
            $this->attributeRepository->update($attribute, $attributeUpdateRequest->validated()),
            200
        );
    }
    public function show(Attribute $attribute)
    {
        return $this->successResponse($this->attributeRepository->show($attribute), 200);
    }
    public function destroy(Attribute $attribute)
    {
        $result = $this->attributeRepository->delete($attribute);
        return $this->successResponse($result, 200);
    }
}

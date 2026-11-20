<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttributeOptionsRepository;
use App\Http\Requests\AttributeOptionsRequest;
use App\Models\Attribute;
use App\Models\AttributeOptions;
use Illuminate\Http\Request;

class AttributeOptionsController extends ApiController
{
    private $attributeOptionsRepository;

    public function __construct(AttributeOptionsRepository $attributeOptionsRepository)
    {
        $this->attributeOptionsRepository = $attributeOptionsRepository;
    }

    public function store(Attribute $attribute, AttributeOptionsRequest $attributeOptionsRequest)
    {
        $result = $this->attributeOptionsRepository->store($attribute, $attributeOptionsRequest->validated());
        return $this->successResponse($result, 201);
    }
    public function destroy(AttributeOptions $attributeOptions)
    {
        $result = $this->attributeOptionsRepository->delete($attributeOptions);
        return $this->successResponse($result, 200);
    }
}

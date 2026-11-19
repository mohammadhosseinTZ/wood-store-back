<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttributeRepository;
use App\Models\Attribute;
use Illuminate\Http\Request;

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
    public function store(Attribute $attribute)
    {
        return $this->successResponse($this->attributeRepository->show($attribute), 200);
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

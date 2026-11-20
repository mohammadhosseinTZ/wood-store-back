<?php

namespace App\Repository;

use App\Contracts\Interfaces\AttributeOptionsRepository;
use App\Contracts\Interfaces\CategoryRepository;
use App\Models\Attribute;
use App\Models\AttributeOptions;
use App\Models\Category;

class AttributeOptionsRepositoryImp implements AttributeOptionsRepository
{

    public function store($attribute, array $data)
    {
        $result =AttributeOptions::create($data);
        return $result;
    }

    public function delete(AttributeOptions $attributeOptions)
    {
        $attributeOptions->delete();
        return $attributeOptions;
    }
}

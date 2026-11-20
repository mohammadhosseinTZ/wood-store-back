<?php

namespace App\Contracts\Interfaces;

use App\Models\Attribute;

interface AttributeOptionsRepository
{
    public function store( Attribute $attribute ,array $data);
    public function delete(\App\Models\AttributeOptions $attributeOptions);
}

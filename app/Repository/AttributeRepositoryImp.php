<?php

namespace App\Repository;

use App\Contracts\Interfaces\AttributeRepository;
use App\Contracts\Interfaces\CategoryRepository;
use App\Models\Attribute;
use App\Models\Category;
use Override;

class AttributeRepositoryImp implements AttributeRepository
{
    public function getAll()
    {
        return Attribute::orderBy("id", "desc")->paginate(10);
    }
    public function store(array $data)
    {
        $result = Attribute::create($data);
        return $result;
    }
    public function update(Attribute $attribute, array $data)
    {
        $attribute->update($data);
        return $attribute;
    }
    public function show(Attribute $attribute)
    {
        return $attribute;
    }
    public function delete(Attribute $attribute)
    {
        $attribute->delete();
        return $attribute;
    }
}

<?php

namespace App\Contracts\Interfaces;

interface AttributeRepository
{
    public function getAll();
    public function store(array $data);
    public function update(\App\Models\Attribute $attribute, array $data);
    public function delete(\App\Models\Attribute $attribute);
    public function show(\App\Models\Attribute $attribute);
}

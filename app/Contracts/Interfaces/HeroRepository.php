<?php

namespace App\Contracts\Interfaces;

interface HeroRepository
{
    public function getAll();
    public function store(array $data);
    public function update(\App\Models\Hero $hero, array $data);
    public function delete(\App\Models\Hero $hero);
    public function show(\App\Models\Hero $hero);
}

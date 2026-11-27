<?php

namespace App\Repository;

use App\Contracts\Interfaces\HeroRepository;
use App\Models\Hero;

class HeroRepositoryImp implements HeroRepository
{
    public function getAll()
    {
        return Hero::all();
    }
    public function store(array $data)
    {
        $result = Hero::create($data);
        return $result;
    }
    public function update(Hero $hero, array $data)
    {
        $hero->update($data);
        return $hero;
    }
    public function show(Hero $hero)
    {
        return $hero;
    }
    public function delete(Hero $hero)
    {
        $hero->delete();
        return $hero;
    }
}

<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\HeroRepository;
use App\Http\Requests\HeroRequest;
use App\Models\Hero;

class HeroController extends ApiController
{
    private $heroRepository;

    public function __construct(HeroRepository $heroRepository)
    {
        $this->heroRepository = $heroRepository;
    }
    public function index()
    {
        return $this->successResponse($this->heroRepository->getAll(), 200);
    }
    public function store(HeroRequest $heroRequest)
    {
        return $this->successResponse($this->heroRepository->store($heroRequest->validated()), 200);
    }
    public function update(Hero $hero, HeroRequest $heroRequest)
    {
        return $this->successResponse(
            $this->heroRepository->update($hero, $heroRequest->validated()),
            200
        );
    }
    public function show(Hero $hero)
    {
        return $this->successResponse($this->heroRepository->show($hero), 200);
    }
    public function destroy(Hero $hero)
    {
        $result = $this->heroRepository->delete($hero);
        return $this->successResponse($result, 200);
    }
}

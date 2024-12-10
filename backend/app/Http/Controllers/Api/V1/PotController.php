<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StorePotRequest;
use App\Models\Pot;
use App\Repositories\Pot\PotRepository;
use Illuminate\Http\JsonResponse;

final class PotController
{
    public function __construct(protected PotRepository $potRepository) {}

    public function index(): JsonResponse
    {
        return response()->json($this->potRepository->all());
    }

    public function store(StorePotRequest $request): JsonResponse
    {
        $this->potRepository->store($request->validated());

        return response()->json(
            status: 204,
        );
    }

    public function update(StorePotRequest $request, Pot $pot): JsonResponse
    {
        $this->potRepository->update($pot, $request->validated());

        return response()->json(
            status: 204,
        );
    }

    public function delete(Pot $pot): JsonResponse
    {
        $this->potRepository->delete($pot);

        return response()->json(
            status: 204,
        );
    }
}

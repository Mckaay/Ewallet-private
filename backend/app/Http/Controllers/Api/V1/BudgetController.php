<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreBudgetRequest;
use App\Models\Budget;
use App\Repositories\Budget\PotRepository;
use Illuminate\Http\JsonResponse;

final class BudgetController
{
    public function __construct(protected PotRepository $budgetRepository) {}

    public function index(): JsonResponse
    {
        return response()->json($this->budgetRepository->all());
    }

    public function store(StoreBudgetRequest $request): JsonResponse
    {
        $this->budgetRepository->store($request->validated());

        return response()->json(
            status: 204,
        );
    }

    public function update(StoreBudgetRequest $request, Budget $budget): JsonResponse
    {
        $this->budgetRepository->update($budget, $request->validated());

        return response()->json(
            status: 204,
        );
    }

    public function delete(Budget $budget): JsonResponse
    {
        $this->budgetRepository->delete($budget);

        return response()->json(
            status: 204,
        );
    }
}

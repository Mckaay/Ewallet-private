<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreBudgetRequest;
use App\Http\Resources\V1\Budget\BudgetResource;
use App\Models\Budget;
use App\Repositories\Budget\BudgetRepository;
use App\Repositories\Transaction\TransactionRepository;
use Illuminate\Http\JsonResponse;

final class BudgetController
{
    public function __construct(protected BudgetRepository $budgetRepository) {}

    public function index(TransactionRepository $transactionRepository): JsonResponse
    {
        $transactions = $transactionRepository->getLatestCategoriesSpendings();
        $budgets = $this->budgetRepository->all();
        return response()->json($this->budgetRepository->all());
    }

    public function show(Budget $budget): JsonResponse
    {
        $budget->load(['category', 'theme']);
        return response()->json(new BudgetResource($budget));
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

    public function availableCategories(): JsonResponse
    {
        return response()->json(
            $this->budgetRepository->getAvailableCategories(),
        );
    }

    public function availableThemes(): JsonResponse
    {
        return response()->json(
            $this->budgetRepository->getAvailableThemes(),
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StoreBudgetRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'limit' => 'required', 'integer', 'min:1', 'max:2000000',
            'category_id' => 'required|integer|exists:categories,id|unique:budgets,category_id',
            'theme_id' => 'required|integer|exists:themes,id|unique:budgets,theme_id',
        ];
    }
}

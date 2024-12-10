<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBudgetRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'limit' => 'required', 'integer', 'min:1', 'max:2000000',
            'category_id' => 'required|integer|exists:categories,id',
            'theme_id' => 'required|integer|exists:themes,id',
        ];
    }
}

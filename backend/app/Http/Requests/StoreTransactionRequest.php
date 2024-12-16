<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StoreTransactionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|between:2,50',
            'amount' => 'required|numeric:|min:-200000',
            'category_id' => 'required|integer|exists:categories,id',
            'date' => 'required|date|date_format:Y-m-d',
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StorePotRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'target' => 'required|integer|max:2000000',
            'theme_id' => 'required|integer|exists:themes,id',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSongRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'url' => 'sometimes|string',
            'albumId' => 'sometimes|exists:albums,id',
            'image' => 'sometimes|string'
        ];
    }
}

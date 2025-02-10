<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSongRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|string|unique:songs,url',
            'albumId' => 'required|exists:albums,id', 
            'image' => 'required|string'
        ];
    }
}

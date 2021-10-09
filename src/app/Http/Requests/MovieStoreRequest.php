<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class MovieStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'between:1,50'],
            'format' => ['required', 'string', Rule::in("VHS", "DVD", "Streaming")], 
            'length' => ['required', 'Int', 'between:0,500'], 
            'release_year' => ['required', 'Int', 'between:1800,2100'], 
            'rating' => ['required', 'Int', 'between:1,5'], 
        ];
    }
}

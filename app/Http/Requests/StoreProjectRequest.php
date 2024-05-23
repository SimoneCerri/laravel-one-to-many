<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type_id'=>'nullable|exists:types,id',
            'title'=>'required|min:10|max:50|',
            'img'=>'nullable|image|max:500',
            'content'=> 'nullable',
            'url1'=> 'nullable|max:255',
            'url2' => 'nullable|max:255',
        ];
    }
}

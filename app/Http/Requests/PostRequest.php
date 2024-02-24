<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:128',
            'short_content' => ['required','max:300'],
            'content' => 'required',
        ];
    }
    public function messages(): array
{
    return [
        'title.required' => 'Postning sarlavha satri kiritilmagan',
        'title.max' => 'Postning sarlavha satri uzunligi 128 belgidan kam bo`lishi kerak',
        'short_content.required' => 'Postning qisqacha mazmuni kiritilmagan',
        'short_content.max' => 'Postning qisqacha mazmuni 300 belgidan kam bo`lishi kerak',
        'content.required' => 'Postning to`liq mazmuni kiritilmagan',        
    ];
}
}

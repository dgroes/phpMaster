<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'title' => ['required', 'min:5', 'max:30'],
            'description' => ['required', 'min:5', 'max:100'],
            'action' => 'nullable|in:markAsComplete,markAsPending',
        ];
    }

   /*  public function messages()
    {
        return [
            'title.required' => "El campo de :attribute es requisito para el formulario 🙃",
            'slug.required' => "El campo de slug es requisito para el formulario 😞"
        ];
    } */

   /*  public function attributes()
    {
        return [
            'title' => 'name',
        ];
    } */
}

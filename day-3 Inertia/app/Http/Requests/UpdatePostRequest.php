<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        // dd($this->route('post'));

        return [
            'title' => 'required|string|min:3|unique:posts,title,' . $this->route('post'),
        'description' => 'required|string|min:10',
        'creator' => 'required|exists:users,id',
        ];
    }
}

<?php

namespace App\Http\Requests\Put;

use App\Enum\Concrect\CommonFields;
use App\Http\Requests\Post\RolePostRequest;
use Illuminate\Foundation\Http\FormRequest;

class RolePutRequest extends FormRequest
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
        $data = (new RolePostRequest())->rules();
        $data[CommonFields::ID] = ['required'];
        return $data;
    }
}

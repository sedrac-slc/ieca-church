<?php

namespace App\Http\Requests\Put;

use App\Http\Requests\Post\UserPostRequest;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use App\Enum\Concrect\CommonFields;


class UserPutRequest extends FormRequest
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
        $data = (new UserPostRequest())->rules();
        $data[CommonFields::ID] = ['required'];
        $data[USER::EMAIL] = ['required'];
        $data[USER::IDENTITY_CARD] = ['required'];
        unset($data[User::PASSWORD]);
        unset($data[User::PASSWORD_CONFIRMATION]);
        return $data;
    }
}

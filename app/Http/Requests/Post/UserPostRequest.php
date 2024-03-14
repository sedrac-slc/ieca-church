<?php

namespace App\Http\Requests\Post;

use App\Enum\Concrect\Gender;
use App\Enum\Concrect\MaritalStatus;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
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
        $regex_words = 'regex:/^\w+(\s\w+)+/u';
        return [
            User::EMAIL => ['required','email','unique:'.User::class],
            User::IDENTITY_CARD  => ['required','regex:/^\d{9}[A-Z]{2}\d{3}/u','unique:'.User::class],
            User::FULLNAME  => ['required', $regex_words],
            User::FULLNAME_FATHER  => ['required', $regex_words],
            User::FULLNAME_MOTHER  => ['required', $regex_words],
            User::MARITAL_STATUS  => ['required',MaritalStatus::regex()],
            User::GENDER  => ['required',Gender::regex()],
            User::BIRTHDAY => ['required','date'],
            User::PASSWORD => ['required'],
            User::PASSWORD_CONFIRMATION => ['required'],
        ];
    }
}

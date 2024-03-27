<?php

namespace App\Http\Requests\Post;

use App\Models\BaptismUser;
use Illuminate\Foundation\Http\FormRequest;

class BaptismUserPostRequest extends FormRequest
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
            BaptismUser::BAPTISM_CONGREGATION => ['required'],
            BaptismUser::BAPTISM_LOCAL => ['required'],
            BaptismUser::BAPTISM_DATE => ['required','date'],

            BaptismUser::CONFIRM_CONGREGATION => ['required'],
            BaptismUser::CONFRIM_LOCAL => ['required'],
            BaptismUser::CONFRIM_DATE => ['required','date'],

            BaptismUser::RECEIVED_CONGREGATION => ['required'],
            BaptismUser::RECEIVED_LOCAL=> ['required'],
            BaptismUser::RECEIVED_LOCAL => ['required','date'],

            BaptismUser::ISSUED_ON => ['required','date'],
        ];
    }
}

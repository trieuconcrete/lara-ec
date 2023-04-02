<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rule = [
            'first_name' => 'required|string',
            'last_name' => 'required|string'
        ];
        if ($this->is_update_password) {
            $rule['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }
        return $rule;
    }
}

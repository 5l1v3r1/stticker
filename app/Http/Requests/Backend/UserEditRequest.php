<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class UserEditRequest extends Request
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
            "email" => "required|email|unique:users,email,".$this->get("id"),
            "password" => "confirmed|min:6",
            "role" => "required|in:user,admin"
        ];
    }
}

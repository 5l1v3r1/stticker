<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class StickerCategoryEditRequest extends Request
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
            "name"      => "required",
            "slug"      => "required|unique:sticker_categories,slug,".$this->get("id"),
            "parent_id" => "required",
        ];
    }
}

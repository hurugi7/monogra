<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateItem extends FormRequest
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
            'item_name' => 'required|max:60',
            'item_num' => 'numeric|nullable',
            'purchased_at' => 'date|nullable',
            'purchased_in' => 'string|max:30|nullable',
            'price' => 'numeric|nullable',
            'note' => 'string|nullable',
            'files.*.photo' => 'image|mimes:jpeg,png|max:256000',
        ];
    }

    public function attributes()
    {
        return [
            'item_name' => 'アイテム名',
            'item_num' => '個数',
            'purchased_at' => '購入日',
            'price' => '値段',
            'files.*.photo' =>'アイテム写真'
        ];
    }
}

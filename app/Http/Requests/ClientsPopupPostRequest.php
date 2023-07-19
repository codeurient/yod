<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsPopupPostRequest extends FormRequest
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
            'name' => 'required|string|max:500',
            'email' => 'required|email|max:500',
            'phone' => 'required|string|max:500',
            'city' => 'required|string|max:500',
            'message_text'=> 'required|string|max:500',
        ];
    }
}

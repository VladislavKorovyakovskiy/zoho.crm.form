<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'accountName' => 'required|min:3|max:100',
            'accountNumber' => 'nullable|numeric',
            'accountSite' => 'nullable|url:http,https'
        ];
    }

    public function messages() {
        return [
            'accountName.required' => 'Название сделки является обязательным к заполнению',
            'accountName.min' => 'Название сделки не может быть короче 5 символов',
            'accountName.max' => 'Название сделки не может быть длинее 5 символов',
            'accountSite.url' => 'Поле с сайтом должно содержать ссылку "http://"',
            'accountNumber.numeric' => 'Поле с номером может содержать только цифры'
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Player;
use Illuminate\Foundation\Http\FormRequest;

class SavePlayerRequest extends FormRequest
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
            'name' => 'required'
        ];
    }

    /**
     * Custom validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Enter a name doofus!'
        ];
    }

    public function save()
    {
        Player::create(['name' => ucwords($this->name)]);
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Players extends FormRequest
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
            'firstname'=> ['required','max:40'],
            'lastname'=> ['required','max:40'],
            'pseudo'=> ['required','max:40','unique:players'],
            'age'=> ['required'],
            'teams_id'=> ['integer']
        ];
    }
}

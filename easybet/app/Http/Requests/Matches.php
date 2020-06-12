<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Matches extends FormRequest
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
            'name'=>['required','max:40', 'unique:games'],
            'games_id'=>['required','integer'],
            'teams_id'=>['required','integer'],
            'teams2_id'=>['required','different:teams_id'],
        ];
    }
}

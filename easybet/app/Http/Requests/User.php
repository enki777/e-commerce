<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends FormRequest
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
            'username' => ['required', 'unique:users,username,' . Auth::id(), 'max:255'],
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'birthday' => ['required', 'date', function ($attribute, $value, $fails) {
                $now = new \DateTime(date('Y-m-d'), new \DateTimeZone('Europe/Paris'));
                $value = new \DateTime($value, new \DateTimeZone('Europe/Paris'));

                $diff = date_diff($now, $value);

                if ($diff->y < 18) {
                    $fails('You must be of legal age.');
                }
            }],
            'address' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', function ($attribute, $value, $fails) {
                if (!Hash::check($value, Auth::user()->getAuthPassword())) {
                    $fails('Wrong ' . $attribute . '.');
                }
            }, 'max:255'],
        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function verifyEmail()
    {
        Auth::user()->sendEmailVerificationNotification();
        return back();
    }

    /**
     * Show user's profile
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $user = User::find(Auth::id());
        if (!$user->hasVerifiedEmail()) {
            session()->put('verify', 'Please verify your e-mail address to proceed bets !');
        } else {
            session()->forget('verify');
        }
        return view('user.profile', compact('user'));
    }

    /**
     * Show form to update user's profile
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $user = User::find(Auth::id());
        return view('user.edit', compact('user'));
    }

    /**
     * Update user's profile
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        $validador = Validator::make($request->all(), [
            'username' => ['required', 'unique:users,username,' . Auth::id(), 'max:255'],
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'birthday' => ['required', 'date'],
            'address' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', function ($attribute, $value, $fails) {
                if (!Hash::check($value, Auth::user()->getAuthPassword())) {
                    $fails('Wrong ' . $attribute . '.');
                }
            }, 'max:255'],
        ]);

        if ($validador->fails()) {
            return back()
                ->withErrors($validador)
                ->withInput();
        }

        $user->fill($request->except('password'));
        $user->save();

        return back()
            ->with('update-success', 'Your profile has been successfully updated !');
    }

    /**
     * Show form to update user's password
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPassword()
    {
        return view('user.password');
    }

    /**
     * Update user's password
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::id());

        $validator = Validator::make($request->all(), [
            'password' => ['required', function ($attribute, $value, $fails) {
                if (!Hash::check($value, Auth::user()->getAuthPassword())) {
                    $fails('Wrong ' . $attribute . '.');
                }
            }],
            'new_password' => ['required', 'min:8', 'same:new_password_confirmation', 'max:255'],
            'new_password_confirmation' => ['required', 'min:8', 'max:255'],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        }

        $user->fill(['password' => Hash::make($request->new_password)]);
        $user->save();

        return back()
            ->with('password-success', 'Your password has been successfully updated !');
    }
}

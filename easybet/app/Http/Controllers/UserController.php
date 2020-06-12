<?php

namespace App\Http\Controllers;

use App\Game;
use App\Matches;
use App\Teams;
use App\User;
use App\Http\Requests\User as UserRequest;
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
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request)
    {
        $user = User::find(Auth::id());
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

    /**
     * Show form to delete user's account
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete()
    {
        return view('user.delete');
    }

    public function deleteConfirm(Request $request)
    {
        $user = User::find(Auth::id());

        $validator = Validator::make($request->all(), [
            'password' => ['required', function ($attribute, $value, $fails) {
                if (!Hash::check($value, Auth::user()->getAuthPassword())) {
                    $fails('Wrong ' . $attribute . '.');
                }
            }],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        }

        $user->delete();

        return redirect()
            ->route('register')
            ->with('delete', 'Your account has been deleted !');
    }

    public function bet()
    {
        $user = User::find(Auth::id())->bets;
        $game = Game::find($user[0]->games_id)->categories;
        $teams_1 = Matches::find($user[0]->games_id)->teams;
        $teams_2 = Matches::find($user[0]->games_id)->teams2;
        return [$user, $game, $teams_1, $teams_2];
    }
}

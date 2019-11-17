<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);
        return view('profile.profile', compact('user'));
    }

    public function edit()
    {
        if (Auth::user()) {
            $user = User::findOrFail(Auth::user()->id);

            return view('profile.edit')->withUser($user);
        } else {
            return redirect()->back();
        }
    }

    public function update(User $user)
    {
        $userData = request()->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|unique:users,email,' . $user->id,
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
        ]);

        $addressData = request()->validate([
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'nullable|integer|max:9999',
            'line_1' => 'required|string|max:255',
            'line_2' => 'nullable|string|max:255',
        ]);

        auth()->user()->update($userData);
        auth()->user()->address->update($addressData);

        //Flash::message('Your account has been updated!');
        return redirect("/profile/{$user->id}");
    }
}

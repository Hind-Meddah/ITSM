<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class FirstTimePasswordChangeController extends Controller
{
    //
    public function edit()
    {
        return view('auth.change-password');
    }

    public function store(Request $request)
    {
            $request->validate([
            'currentpassword' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Auth::user();
        //dd($user);
        // Check if the current password correct
        if (!Hash::check($request->currentpassword, $user->password)) {
            return back()->withErrors(['currentpassword' => 'Le mot de passe actuel est incorrect.']);
        }

        // Update the user password
        $user->password = Hash::make($request->password);
        $user->First_Login_check = 1;
        $user->save();

        return redirect()->route('dashboard')->with('status', 'Votre mot de passe a été modifié avec succès.');
    }





}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{

    /**
     * Show the profile for the logged-in user.
     */
    public function show()
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        return view('profile.show', compact('user'));
    }

    /**
     * Update the profile for the logged-in user.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // $user = Auth::user();
        $user = User::find(Auth::id());
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->update();

        
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}


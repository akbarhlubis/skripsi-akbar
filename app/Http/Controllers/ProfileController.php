<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|min:8',
            'avatar' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);

        if ($request->avatar) {
            
            $request->avatar->move(public_path('images'), $request->avatar->getClientOriginalName());
        }
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $request->avatar ? $request->avatar->getClientOriginalName() : $user->avatar,
        ];

        if ($request->password) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        return back()->with('success', 'User updated successfully.');
    }

    protected function destroy(User $user)
    {
        $user->delete(); // delete user

        auth()->logout(); // logout user

        return redirect() // redirect to homepage
            ->route('home-page') // with success message
            ->with('success', 'Your account has been deleted!'); // that account has been deleted
    }

    protected function deleteOldImage()
    {
        if (auth()->user()->image)
        {
            Storage::delete('/public/images/'.auth()->user()->avatar);
        }
    }

}

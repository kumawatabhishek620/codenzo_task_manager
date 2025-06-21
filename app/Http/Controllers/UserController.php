<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // List all users
    public function index()
    {
      $users = User::whereIn('status', [1,2])->get();
        return view('users.index', compact('users'));
    }

    // Show create form
    public function create()
    {
        return view('users.create');
    }

    // Store new user
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'mobile'   => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        User::create([
            'mobile' => $request->mobile,
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 1
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Show single user
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Show edit form
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
           'username' => 'required|unique:users,username,' . $user->id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'mobile' => 'required|unique:users,mobile,' . $user->id,
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->update([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'status' => $request->status
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Delete user
   public function destroy(User $user)
{
    $user->status = 3;
    $user->save();

    return redirect()->route('users.index')->with('success', 'User status set to Deleted.');
}

}
